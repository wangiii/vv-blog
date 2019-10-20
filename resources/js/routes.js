import Home from './components/Home.vue'
import Article from './components/Article.vue'
import Category from './components/Category.vue'
import Tag from './components/Tag.vue'

const routes = [
    {
        path: '/',
        name : 'home',
        component: Home
    },
    {
        path: '/article/:id',
        name : 'article',
        component: Article
    },
    {
        path: '/category/:id',
        name : 'category',
        component: Category
    },
    {
        path: '/tag/:id',
        name : 'tag',
        component: Tag
    },
]

export default routes