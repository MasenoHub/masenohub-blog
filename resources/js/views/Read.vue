<template>
    <div class="demo-blog demo-blog--blogpost mdl-layout mdl-js-layout has-drawer is-upgraded">
        <div v-if="showLoading" class="mdl-spinner mdl-js-spinner is-active" style="margin: 16px;'"></div>

        <main class="mdl-layout__content" v-else>
            <div class="demo-back">
                <router-link :to="{ name: 'home' }" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" title="go back" role="button">
                    <i class="material-icons" role="presentation">arrow_back</i>
                </router-link>
            </div>
            <div class="demo-blog__posts mdl-grid">
                <div class="mdl-card mdl-shadow--4dp mdl-cell mdl-cell--12-col">
                    <div class="mdl-card__title mdl-color-text--grey-50" v-if="!post.overlay" style="background-color: #263238;">
                        <h3 class="quote">{{post.subject}}</h3>
                    </div>
                    <div class="mdl-card__media mdl-color-text--grey-50" v-else v-bind:style="'background-image: url(' + post.overlay + '); height: 280px;'">
                        <h3>{{post.subject}}</h3>
                    </div>
                    <div class="mdl-color-text--grey-700 mdl-card__supporting-text meta">
                        <div class="minilogo" v-bind:style="'background-image: url(' + post.author.avatar + ')'"></div>
                        <div>
                            <strong>{{post.author.name}}</strong>
                            <span>{{new Date(post.created_at).toLocaleDateString(undefined, { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' })}}</span>
                        </div>
                        <div class="section-spacer"></div>
                        <div class="meta__favorites">
                            {{post.reactions.favorites.count}} <i class="material-icons" role="presentation">{{post.reactions.favorites.status ? "favorite" : "favorite_bordered"}}</i>
                            <span class="visuallyhidden">favorites</span>
                        </div>
                        <div>
                            <i class="material-icons" role="presentation">{{post.reactions.bookmarked ? "bookmark" : "bookmark_bordered"}}</i>
                            <span class="visuallyhidden">bookmark</span>
                        </div>
                        <div>
                            <i class="material-icons" role="presentation">share</i>
                            <span class="visuallyhidden">share</span>
                        </div>
                    </div>
                    <div class="mdl-color-text--grey-700 mdl-card__supporting-text">
                        <p><i>{{post.summary}}</i></p>
                        <hr>
                        <p>{{post.content}}</p>
                    </div>
                    <div class="mdl-color-text--primary-contrast mdl-card__supporting-text comments">
                        <form>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <textarea rows=1 class="mdl-textfield__input" id="comment"></textarea>
                                <label for="comment" class="mdl-textfield__label">Join the discussion</label>
                            </div>
                            <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
                                <i class="material-icons" role="presentation">check</i><span class="visuallyhidden">add comment</span>
                            </button>
                        </form>
                        <comment-component v-for="comment in post.comments" v-bind:comment="comment" v-bind:key="comment.id"></comment-component>
                    </div>
                </div>

                <nav class="demo-nav mdl-cell mdl-cell--12-col">
                    <router-link v-bind:to="{name: 'read', params: {slug: newerPost}}" v-bind:class="[{ disabled: navigationDisabled, invisible: !newerPost}, 'demo-nav__button']" title="show newer">
                        <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" role="presentation" v-bind:disabled="navigationDisabled">
                            <i class="material-icons" role="presentation">arrow_back</i>
                        </button>
                        Newer Post
                    </router-link>
                    
                    <div class="section-spacer"></div>
                    
                    <router-link v-bind:to="{name: 'read', params: {slug: olderPost}}" v-bind:class="[{ disabled: navigationDisabled, invisible: !olderPost}, 'demo-nav__button']" title="show older">
                        Older Post
                        <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" role="presentation" v-bind:disabled="navigationDisabled">
                            <i class="material-icons" role="presentation">arrow_forward</i>
                        </button>
                    </router-link>
                </nav>
            </div>

            <footer-component/>
        </main>

        <div class="mdl-layout__obfuscator"></div>
    </div>
</template>

<script>
import CommentComponent from '../components/CommentComponent';

    // Overengineered function to fake a post
    function getPost(slug) {
        let owned = Math.random() > .5;
        let postNum = Number.parseInt(slug.charAt(5)); 
        let result = {
            post: {
                id: 1,
                slug,
                subject: slug.charAt(0).toUpperCase() + slug.slice(1, slug.length).replace("-", " "),
                overlay: Math.random() > .5? "../images/road_big.jpg": "",
                summary: "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Facere provident, odit nobis nulla eaque natus a corrupti quod eveniet autem, quos doloremque suscipit mollitia distinctio obcaecati est, adipisci sint possimus?",
                content: "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Facere provident, odit nobis nulla eaque natus a corrupti quod eveniet autem, quos doloremque suscipit mollitia distinctio obcaecati est, adipisci sint possimus? Lorem ipsum dolor sit, amet consectetur adipisicing elit. Facere provident, odit nobis nulla eaque natus a corrupti quod eveniet autem, quos doloremque suscipit mollitia distinctio obcaecati est, adipisci sint possimus? Lorem ipsum dolor sit, amet consectetur adipisicing elit. Facere provident, odit nobis nulla eaque natus a corrupti quod eveniet autem, quos doloremque suscipit mollitia distinctio obcaecati est, adipisci sint possimus? Lorem ipsum dolor sit, amet consectetur adipisicing elit. Facere provident, odit nobis nulla eaque natus a corrupti quod eveniet autem, quos doloremque suscipit mollitia distinctio obcaecati est, adipisci sint possimus? Lorem ipsum dolor sit, amet consectetur adipisicing elit. Facere provident, odit nobis nulla eaque natus a corrupti quod eveniet autem, quos doloremque suscipit mollitia distinctio obcaecati est, adipisci sint possimus? Lorem ipsum dolor sit, amet consectetur adipisicing elit. Facere provident, odit nobis nulla eaque natus a corrupti quod eveniet autem, quos doloremque suscipit mollitia distinctio obcaecati est, adipisci sint possimus? Lorem ipsum dolor sit, amet consectetur adipisicing elit. Facere provident, odit nobis nulla eaque natus a corrupti quod eveniet autem, quos doloremque suscipit mollitia distinctio obcaecati est, adipisci sint possimus? Lorem ipsum dolor sit, amet consectetur adipisicing elit. Facere provident, odit nobis nulla eaque natus a corrupti quod eveniet autem, quos doloremque suscipit mollitia distinctio obcaecati est, adipisci sint possimus? Lorem ipsum dolor sit, amet consectetur adipisicing elit. Facere provident, odit nobis nulla eaque natus a corrupti quod eveniet autem, quos doloremque suscipit mollitia distinctio obcaecati est, adipisci sint possimus?",
                owned,
                published: owned && Math.random() > .5,
                created_at: "2020-02-11 20:41:35",
                author: {
                    id: 1,
                    name: "Some A. Uthor",
                    avatar: "../images/avatar.png",
                },
                reactions: {
                    favorites: {
                        count: Math.ceil(Math.random() * 123),
                        status: Math.random() > .5
                    },
                    bookmarked: Math.random() > .5
                },
                comments: [
                    {
                        text: "Yeah, this post was either so good or so bad that I wrote something about it hover here and now I'm really sating nothing just trying to fill this space with text...",
                        created_at: "2020-02-11 20:41:35",
                        author: {
                            id: 1,
                            name: "F. Urst",
                            avatar: "../images/co1.jpg",
                        },
                    },
                    {
                        text: "Yeah, this post was either so good or so bad that I wrote something about it hover here and now I'm really sating nothing just trying to fill this space with text...",
                        created_at: "2020-02-11 20:41:35",
                        author: {
                            id: 2,
                            name: "Sir Cond",
                            avatar: "../images/co2.jpg",
                        },
                    }
                ]
            },
            newerPost: postNum > 1 ? "post-" + (postNum - 1) : null,
            olderPost: postNum < 5 ? "post-" + (postNum + 1) : null,
        }

        return result;
    }

    export default {
        data() {
            return {
                post: {},
                olderPost: null,
                newerPost: null,
                navigationDisabled: false,
                showLoading: true
            }
        },
        created() {
            this.updatePage(this.$route.params.slug);
        },
        methods: {
            updatePage: function(slug) {
                this.navigationDisabled = true;
                this.showLoading = true;

                // Dummy HTTP request
                setTimeout(() => {
                    let result = getPost(slug);
                    this.post =  result.post;
                    this.olderPost = result.olderPost;
                    this.newerPost = result.newerPost;
                    this.navigationDisabled = false;
                    this.showLoading = false;
                }, 3000);
            }
        }, 
        components: {CommentComponent},
        beforeRouteUpdate (to, from, next) {
            this.updatePage(to.params.slug);
            next();
        }
    }
</script>