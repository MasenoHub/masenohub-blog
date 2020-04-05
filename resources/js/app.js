/**
 * This constant represents the number of posts that should be displayed per page.
 */
const postsPerPage = 3;

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('post-component', require('./components/PostComponent.vue').default);

/**
 * Intializing Vue
 */
const app = new Vue({
    el: '#app',
    data: {
        page: 1, 
        totalPosts: 0,
        posts: [],

        navigationDisabled: false
    },
    computed: {
        firstPost: function() {
            return (this.page * postsPerPage) - postsPerPage
        },
        pages: function() {
            return Math.ceil(this.totalPosts / postsPerPage)
        },
        // posts: getPosts(firstPost, postsPerPage)
    },
    watch: {
        page: function(newPage, oldPage) {
            updateList();
        }
    },
    methods: {
        prevPage: function () {
            if (this.page > 1) this.page--;
        },
        nextPage: function () {
            if (this.page < this.pages) this.page++;
        },
    }
});

updateList();

function updateList() {
    app.navigationDisabled = true;

    // Dummy HTTP request
    setTimeout(() => {
        result = getPosts(app.firstPost, postsPerPage);
        app.totalPosts = result.totalPosts;
        app.posts =  result.posts;
        app.navigationDisabled = false;
    }, 1500);
}


function getPosts(offset, count) {
    alert("The function got called! " + offset);
    return {
        totalPosts: 9,
        posts: 
        [
            {
                id: offset + 1,
                subject: "Post One",
                summary: "This is the first post on this site",
                overlay: "images/road.jpg",
                owned: true,
                published: true,
                created_at: "2020-02-11 20:41:35",
                author: {
                    id: 1,
                    name: "Peter Mghendi",
                    avatar: "images/avatar.png",
                }
            },
            {
                id: offset + 2,
                subject: "Post Two",
                summary: "This is the second post on this site",
                overlay: "images/road.jpg",
                owned: true,
                published: true,
                created_at: "2020-02-11 20:41:35",
                author: {
                    id: 2,
                    name: "Other Guy",
                    avatar: "",
                }
            },
            {
                id: offset + 3,
                subject: "Post Three",
                summary: "This is the third post on this site",
                overlay: "",
                owned: true,
                published: true,
                created_at: "2020-02-11 20:41:35",
                author: {
                    id: 1,
                    name: "Peter Mghendi",
                    avatar: "images/avatar.png",
                }
            },
        ]
    }
}
