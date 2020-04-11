<template>
    <div class="comment mdl-color-text--grey-700">
        <header class="comment__header">
            <img v-bind:src="comment.author.avatar" class="comment__avatar">
            <div class="comment__author">
                <strong>{{comment.author.name}}</strong>
                <span>{{new Date(comment.created_at).toLocaleDateString(undefined, { dateStyle: "full", timeStyle: "short" })}}</span>
            </div>
        </header>
        <div class="comment__text">{{comment.text}}</div>
        <nav class="comment__actions">
            <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
                <i class="material-icons" role="presentation">thumb_up</i><span class="visuallyhidden">like comment</span>
            </button>
            <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
                <i class="material-icons" role="presentation">thumb_down</i><span class="visuallyhidden">dislike comment</span>
            </button>
            <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
                <i class="material-icons" role="presentation">share</i><span class="visuallyhidden">share comment</span>
            </button>
        </nav>
    </div>
</template>

<script>
export default {
    props: ['comment']
}
</script>