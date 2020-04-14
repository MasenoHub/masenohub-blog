<template>
  <div class="blog blog--blogpost mdl-layout mdl-js-layout has-drawer is-upgraded">
        <main class="mdl-layout__content">

            <div class="blog-back">
                <router-link :to="{ name: 'home' }" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" title="go back" role="button">
                    <i class="material-icons" role="presentation">arrow_back</i>
                </router-link>
            </div>
            <div class="blog__posts mdl-grid">
                <div class="mdl-card mdl-shadow--4dp mdl-cell mdl-cell--12-col">
                    <div class="mdl-card__media mdl-color-text--grey-50">
                        <h3>{{activeAuthPage}}</h3>
                    </div>
                    <div class="mdl-color-text--grey-700 mdl-card__supporting-text meta">
                        <div class="minilogo" style="background-image: url('images/avatar.png')"></div>
                        <div>
                            <strong>The Newist</strong>
                        </div>
                    </div>
                    <div style="display: flex">
                        <button v-bind:class="[{'mdl-button--accent': activeAuthPage === 'Login', 'mdl-button--primary': activeAuthPage !== 'Login'}, 'mdl-button', 'mdl-js-button']" 
                            v-on:click="activeAuthPage = 'Login'" style="margin-right: auto; margin-left: auto;">Login</button>
                        <button v-bind:class="[{'mdl-button--accent': activeAuthPage === 'Register', 'mdl-button--primary': activeAuthPage !== 'Register'}, 'mdl-button', 'mdl-js-button']"
                            v-on:click="activeAuthPage = 'Register'" style="margin-right: auto; margin-left: auto;">Register</button>
                    </div>
                    <component v-bind:is="activeAuthPage"></component>
                </div>
            </div>

            <footer-component></footer-component>
        </main>

        <div class="mdl-layout__obfuscator"></div>
    </div>
</template>

<script>
import Login from './Login';
import Register from './Register';

export default {
    data() {
        return {
            activeAuthPage: 'Login'
        }
    },
    components: {Login, Register}
}
</script>