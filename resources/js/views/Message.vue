<template>
<div class="demo-blog demo-blog--blogpost mdl-layout mdl-js-layout has-drawer is-upgraded">
        <main class="mdl-layout__content">

            <div class="demo-back">
                <router-link :to="{ name: 'home' }" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" title="go back" role="button">
                    <i class="material-icons" role="presentation">arrow_back</i>
                </router-link>
            </div>
            <div class="demo-blog__posts mdl-grid">
                <div class="mdl-card mdl-shadow--4dp mdl-cell mdl-cell--12-col">
                    <div class="mdl-card__media mdl-color-text--grey-50">
                        <h3>Message Us!</h3>
                    </div>
                    <div class="mdl-color-text--grey-700 mdl-card__supporting-text meta">
                        <div class="minilogo" style="background-image: url('images/avatar.png')"></div>
                        <div>
                            <strong>The Newist</strong>
                        </div>
                        <div class="section-spacer"></div>
                        <div>
                            <!-- <i class="material-icons" role="presentation">share</i> -->
                            <span class="visuallyhidden">share</span>
                        </div>
                    </div>
                    <div class="mdl-color-text--grey-700 mdl-card__supporting-text">
                        <p>
                            Leave a review! We'll try to get back to you as soon as possible. 
                        </p>
                        <form action="" method="post"></form>
                        <p>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="text" name="name" id="name">
                                <label class="mdl-textfield__label" for="name">Your name...</label>
                                <span class="mdl-textfield__error">Only alphabet and spaces, please!</span>
                            </div>
                        </p>
                        <p>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="email" name="email" id="email">
                                <label class="mdl-textfield__label" for="email">Your email address...</label>
                                <span class="mdl-textfield__error">Enter a valid email address!</span>
                            </div>
                        </p>
                        <p>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <textarea class="mdl-textfield__input" type="text" name="body" id="body" rows="2" required></textarea>
                                <label class="mdl-textfield__label" for="body">Describe your experience on the site...</label>
                                <span class="mdl-textfield__error">This field is required!</span>
                            </div>
                        </p>
                        <button class="mdl-button mdl-js-button mdl-button--accent" type="submit">Submit</button>
                    </div>
                </div>
            </div>

            <footer class="mdl-mini-footer">
                <div class="mdl-mini-footer--left-section">
                    <button class="mdl-mini-footer--social-btn social-btn social-btn__twitter">
                        <span class="visuallyhidden">Twitter</span>
                    </button>
                    <button class="mdl-mini-footer--social-btn social-btn social-btn__blogger">
                        <span class="visuallyhidden">Facebook</span>
                    </button>
                    <button class="mdl-mini-footer--social-btn social-btn social-btn__gplus">
                        <span class="visuallyhidden">Google Plus</span>
                    </button>
                </div>
                <div class="mdl-mini-footer--right-section">
                    <button class="mdl-mini-footer--social-btn social-btn__share">
                        <i class="material-icons" role="presentation">share</i>
                        <span class="visuallyhidden">share</span>
                    </button>
                </div>
            </footer>
        </main>

        <div class="mdl-layout__obfuscator"></div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            formData: {
                name: "",
                email: "",
                rating: 3,
                description: ""
            }
        }
    }

}
</script>