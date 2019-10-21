<template>
    <div class="container">
        <div v-if="articles_count !== 0 && articles_count !== null">
            <div class="card">
                <div class="card-header">
                    <h3 style="color: darkgray">
                        <svg t="1568200009846" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="3104" width="46" height="46"><path d="M291 485.7c-51.6 0-100.3-20.2-137-57-36.7-36.7-57-85.4-57-137s20.2-100.3 57-137c36.7-36.7 85.4-57 137-57 51.6 0 100.3 20.2 137 57 36.7 36.7 57 85.4 57 137s-20.2 100.3-57 137c-36.7 36.8-85.3 57-137 57z m0-340c-80.5 0-146 65.5-146 146s65.5 146 146 146 146-65.5 146-146-65.5-146-146-146zM291 927.7c-51.6 0-100.3-20.2-137-57-36.7-36.7-57-85.4-57-137s20.2-100.3 57-137 85.4-57 137-57c51.6 0 100.3 20.2 137 57s57 85.4 57 137c0 51.6-20.2 100.3-57 137-36.7 36.8-85.3 57-137 57z m0-340c-80.5 0-146 65.5-146 146s65.5 146 146 146 146-65.5 146-146-65.5-146-146-146zM803 927.7H663c-68.4 0-124-55.6-124-124v-140c0-13.3 10.7-24 24-24s24 10.7 24 24v140c0 41.9 34.1 76 76 76h140c41.9 0 76-34.1 76-76v-140c0-41.9-34.1-76-76-76H663c-13.3 0-24-10.7-24-24s10.7-24 24-24h140c68.4 0 124 55.6 124 124v140c0 68.4-55.6 124-124 124zM733 485.7c-51.6 0-100.3-20.2-137-57-36.7-36.7-57-85.4-57-137s20.2-100.3 57-137c36.7-36.7 85.4-57 137-57s100.3 20.2 137 57 57 85.4 57 137-20.2 100.3-57 137-85.3 57-137 57z m0-340c-80.5 0-146 65.5-146 146s65.5 146 146 146 146-65.5 146-146-65.5-146-146-146z" p-id="3105" fill="#8a8a8a"></path></svg>
                        {{ category_name }} <span class="badge badge-secondary">{{ articles_count }}</span>
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
            <ul class="pagination" v-if="articles && total_pages > 1">
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
                    <p style="color: #6e6e6e">!!!!!！此分类空空如也</p>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        mounted() {
            this.getCategory(this.$route.params.id, this.current_page)
        },
        data() {
            return {
                id : null,
                category_name : null,
                articles : [],
                total_pages : null,
                articles_count : null,
                current_page : 1,
            }
        },
        methods : {
            getCategory : function (id, current_page) {
                this.current_page = current_page
                this.id = id
                axios.get('/api/category/' + id + '?page=' + this.current_page).then(response => {
                    this.category_name = response.data.name
                    this.articles = response.data.articles.data
                    this.total_pages = response.data.articles.meta.pagination.total_pages
                    this.articles_count = response.data.count
                })
                this.toTop()
            },
            nextPage : function () {
                if(this.current_page !== this.total_pages) {
                    this.getCategory(this.id, this.current_page += 1)
                }
            },
            prevPage : function () {
                if(this.current_page !== 1) {
                    this.getCategory(this.id, this.current_page -= 1)
                }
            },
            goPage : function (id, page) {
                this.current_page = page
                this.getCategory(id, page)
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
    .article a {
        color: darkgray;
    }
    .card {
        margin-bottom: 10px;
    }
</style>