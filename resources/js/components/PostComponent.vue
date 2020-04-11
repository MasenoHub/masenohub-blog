<template>
    <!-- TODO: Display ownership, publishing status -->
    <div class="mdl-card mdl-cell mdl-cell--12-col">
        <router-link class="mdl-card__title mdl-color-text--grey-50" tag="div" v-bind:to="{ name: 'read', params: { slug: post.slug }}" v-if="!post.overlay" style="background-color: #263238;">
            <h3 class="quote"><a href="entry.html">{{post.subject}}</a></h3>
        </router-link>
        <router-link class="mdl-card__media mdl-color-text--grey-50" tag="div" v-bind:to="{ name: 'read', params: { slug: post.slug }}" v-else v-bind:style="'background-image: url(' + post.overlay + ')'">
            <h3><a href="entry.html">{{post.subject}}</a></h3>
        </router-link>

        <div class="mdl-color-text--grey-600 mdl-card__supporting-text">
            {{post.summary}}
        </div>

        <div class="mdl-card__supporting-text meta mdl-color-text--grey-600">
            <div class="minilogo" v-bind:style="'background-image: url(' + post.author.avatar + ')'"></div>
            <div>
                <strong>{{post.author.name}}</strong>
                <span>{{new Date(post.created_at).toLocaleDateString(undefined, { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' })}}</span>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['post']
    }
</script>
