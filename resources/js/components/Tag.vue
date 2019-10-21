<template>
    <div class="container">
        <div v-if="articles_count !== 0 && articles_count !== null">
            <div class="card">
                <div class="card-header">
                    <h3 style="color: darkgray">
                        <svg t="1568199888854" class="icon" viewBox="0 0 1097 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="2150" width="46" height="46"><path d="M256 256q0-30.285714-21.428571-51.714286T182.857143 182.857143t-51.714286 21.428571T109.714286 256t21.428571 51.714286T182.857143 329.142857t51.714286-21.428571T256 256z m609.714286 329.142857q0 30.285714-21.142857 51.428572l-280.571429 281.142857q-22.285714 21.142857-52 21.142857-30.285714 0-51.428571-21.142857L52 508.571429q-21.714286-21.142857-36.857143-57.714286T0 384V146.285714q0-29.714286 21.714286-51.428571t51.428571-21.714286h237.714286q30.285714 0 66.857143 15.142857T436 125.142857l408.571429 408q21.142857 22.285714 21.142857 52z m219.428571 0q0 30.285714-21.142857 51.428572l-280.571429 281.142857q-22.285714 21.142857-52 21.142857-20.571429 0-33.714285-8t-30.285715-25.714286l268.571429-268.571428q21.142857-21.142857 21.142857-51.428572 0-29.714286-21.142857-52L527.428571 125.142857q-21.714286-21.714286-58.285714-36.857143T402.285714 73.142857h128q30.285714 0 66.857143 15.142857t58.285714 36.857143l408.571429 408q21.142857 22.285714 21.142857 52z" p-id="2151" fill="#bfbfbf"></path></svg>
                        {{ tag_name }} <span class="badge badge-secondary">{{ articles_count }}</span>
                    </h3>
                </div>
                <div class="list-group">
                    <div v-for="article in articles">
                        <router-link :to="{ name : 'article', params : { id : article.id }}">
                            <div class="list-group-item list-group-item-action" style="color: darkgray;">
                                {{ article.title }}
                                <span class="float-lg-right" style="color: darkgray; display: inline-block">
                                 / {{ article.created_at }}
                                </span>
                            </div>
                        </router-link>
                    </div>
                </div>
            </div>
            <ul class="pagination" v-if="articles && total_pages > 1" @click="toTop">
                <li class="page-item">
                    <a class="page-link" v-on:click="prevPage">‹</a>
                </li>
                <li class="page-item" v-for="p in total_pages" v-bind:class="p === current_page ? 'active' : ''">
                    <a class="page-link" v-on:click="goPage(id, p)">{{ p }}</a>
                </li>
                <li class="page-item">
                    <a class="page-link" v-on:click="nextPage">›</a>
                </li>
            </ul>
        </div>
        <div class="card" v-else>
            <div class="card-body">
                <div class="card-title">
                    <p style="color: #6e6e6e">!!!!!！此标签空空如也</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            this.getTag(this.$route.params.id, this.current_page)
        },
        data() {
            return {
                id : null,
                tag_name : null,
                articles : null,
                total_pages : null,
                articles_count : null,
                current_page : 1,
            }
        },
        methods : {
            getTag : function (id, current_page) {
                this.current_page = current_page
                this.id = id
                axios.get('/api/tag/' + id + '?page=' + this.current_page).then(response => {
                    this.tag_name = response.data.name
                    this.articles = response.data.articles.data
                    this.total_pages = response.data.articles.meta.pagination.total_pages
                    this.articles_count = response.data.count
                })
            },
            nextPage : function () {
                if(this.current_page !== this.total_pages) {
                    this.getTag(this.id, this.current_page += 1)
                }
            },
            prevPage : function () {
                if(this.current_page !== 1) {
                    this.getTag(this.id, this.current_page -= 1)
                }
            },
            goPage : function (id, page) {
                this.current_page = page
                this.getTag(id, page)
            },
            toTop(){
                if(document.body.scrollTop){
                    document.body.scrollTop = 0
                }else {
                    document.documentElement.scrollTop = 0
                }
            },
        }
    }
</script>

<style scoped>
    .card {
        margin-bottom: 10px;
    }
</style>