<template>
    <div class="container">
        <div v-if="title !== null">
        <h3 style="color: darkgray">{{ title }}</h3>
        <div style="padding-bottom: 10px">
            <div v-show="tags.length" class="tags" >
                <svg t="1568199888854" class="icon" viewBox="0 0 1097 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="2150" width="20" height="20"><path d="M256 256q0-30.285714-21.428571-51.714286T182.857143 182.857143t-51.714286 21.428571T109.714286 256t21.428571 51.714286T182.857143 329.142857t51.714286-21.428571T256 256z m609.714286 329.142857q0 30.285714-21.142857 51.428572l-280.571429 281.142857q-22.285714 21.142857-52 21.142857-30.285714 0-51.428571-21.142857L52 508.571429q-21.714286-21.142857-36.857143-57.714286T0 384V146.285714q0-29.714286 21.714286-51.428571t51.428571-21.714286h237.714286q30.285714 0 66.857143 15.142857T436 125.142857l408.571429 408q21.142857 22.285714 21.142857 52z m219.428571 0q0 30.285714-21.142857 51.428572l-280.571429 281.142857q-22.285714 21.142857-52 21.142857-20.571429 0-33.714285-8t-30.285715-25.714286l268.571429-268.571428q21.142857-21.142857 21.142857-51.428572 0-29.714286-21.142857-52L527.428571 125.142857q-21.714286-21.714286-58.285714-36.857143T402.285714 73.142857h128q30.285714 0 66.857143 15.142857t58.285714 36.857143l408.571429 408q21.142857 22.285714 21.142857 52z" p-id="2151" fill="#bfbfbf"></path></svg>
                <div v-for="tag in tags" class="tag-span">
                    <router-link :to="{ name : 'tag', params : { id : tag.id }}"><span class="badge badge-secondary">{{ tag.name }}</span></router-link>
                </div>
            </div>
            <svg t="1568200009846" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="3104" width="20" height="20"><path d="M291 485.7c-51.6 0-100.3-20.2-137-57-36.7-36.7-57-85.4-57-137s20.2-100.3 57-137c36.7-36.7 85.4-57 137-57 51.6 0 100.3 20.2 137 57 36.7 36.7 57 85.4 57 137s-20.2 100.3-57 137c-36.7 36.8-85.3 57-137 57z m0-340c-80.5 0-146 65.5-146 146s65.5 146 146 146 146-65.5 146-146-65.5-146-146-146zM291 927.7c-51.6 0-100.3-20.2-137-57-36.7-36.7-57-85.4-57-137s20.2-100.3 57-137 85.4-57 137-57c51.6 0 100.3 20.2 137 57s57 85.4 57 137c0 51.6-20.2 100.3-57 137-36.7 36.8-85.3 57-137 57z m0-340c-80.5 0-146 65.5-146 146s65.5 146 146 146 146-65.5 146-146-65.5-146-146-146zM803 927.7H663c-68.4 0-124-55.6-124-124v-140c0-13.3 10.7-24 24-24s24 10.7 24 24v140c0 41.9 34.1 76 76 76h140c41.9 0 76-34.1 76-76v-140c0-41.9-34.1-76-76-76H663c-13.3 0-24-10.7-24-24s10.7-24 24-24h140c68.4 0 124 55.6 124 124v140c0 68.4-55.6 124-124 124zM733 485.7c-51.6 0-100.3-20.2-137-57-36.7-36.7-57-85.4-57-137s20.2-100.3 57-137c36.7-36.7 85.4-57 137-57s100.3 20.2 137 57 57 85.4 57 137-20.2 100.3-57 137-85.3 57-137 57z m0-340c-80.5 0-146 65.5-146 146s65.5 146 146 146 146-65.5 146-146-65.5-146-146-146z" p-id="3105" fill="#8a8a8a"></path></svg>
            <router-link :to="{ name : 'category', params : { id : category.id }}"><span class="badge badge-secondary">{{ category.name }}</span></router-link>
            <span style="color: darkgray; display: inline-block">&nbsp;{{ created_at }}</span>
        </div>
        <div class="markdown" v-html="content"></div>
        <br>
        </div>
        <div class="card" v-else>
            <div class="card-body">
                <div class="card-title">
                    <p style="color: #6e6e6e">!!!!!！空空如也</p>
                </div>
            </div>
        </div>
        <br>
    </div>
</template>

<script>
    export default {
        mounted() {
            this.getArticle(this.$route.params.id)
        },
        data() {
            return {
                title : null,
                describe : null,
                content : null,
                tags : [],
                category : null,
                created_at : null,
            }
        },
        methods : {
            getArticle : function (id) {
                axios.get('/api/article/' + id).then(response => {
                    this.title = response.data.data.title
                    this.describe = response.data.data.describe
                    this.content = response.data.data.content
                    this.tags = response.data.data.tags
                    this.category = response.data.data.category
                    this.created_at = response.data.data.created_at
                })
            }
        }
    }
</script>

<style scoped>
    .tags {
        display:inline;
    }
    .tag-span {
        display:inline;
        margin-right: 5px;
    }
</style>