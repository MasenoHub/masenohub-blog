@extends('layouts.app')

@section('content')
<div id="app" class="demo-blog mdl-layout mdl-js-layout has-drawer is-upgraded">
    <main class="mdl-layout__content">

        <div class="demo-blog__posts mdl-grid">
            <div class="mdl-card coffee-pic mdl-cell mdl-cell--8-col">
                <div class="mdl-card__media mdl-color-text--grey-50">
                    <h3><a href="entry.html">Coffee Pic</a></h3>
                </div>
                <div class="mdl-card__supporting-text meta mdl-color-text--grey-600">
                    <div class="minilogo" style="background-image: url('images/avatar.png')"></div>
                    <div>
                        <strong>The Newist</strong>
                        <span>2 days ago</span>
                    </div>
                </div>
            </div>

            <div class="mdl-card something-else mdl-cell mdl-cell--8-col mdl-cell--4-col-desktop">
                <button class="mdl-button mdl-js-ripple-effect mdl-js-button mdl-button--fab mdl-color--accent">
                    <i class="material-icons mdl-color-text--white" role="presentation">add</i>
                    <span class="visuallyhidden">add</span>
                </button>
                <div class="mdl-card__media mdl-color--white mdl-color-text--grey-600">
                    <img src="images/logo.png">
                    +1,337
                </div>
                <div class="mdl-card__supporting-text meta meta--fill mdl-color-text--grey-600">
                    <div>
                        <strong>The Newist</strong>
                    </div>
                    <ul class="mdl-menu mdl-js-menu mdl-menu--bottom-right mdl-js-ripple-effect" for="menubtn">
                        <li class="mdl-menu__item">About</li>
                        <li class="mdl-menu__item">Message</li>
                        <li class="mdl-menu__item">Favorite</li>
                        <li class="mdl-menu__item">Search</li>
                    </ul>
                    <button id="menubtn" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
                        <i class="material-icons" role="presentation">more_vert</i>
                        <span class="visuallyhidden">show menu</span>
                    </button>
                </div>
            </div>

            <post-component v-for="post in posts" v-bind:post="post" v-bind:key="post.id"></post-component>

            <nav class="demo-nav mdl-cell mdl-cell--12-col">
                <a href="#" v-bind:class="[{ disabled: navigationDisabled, invisible: page === 1}, 'demo-nav__button']" title="show newer" v-on="!navigationDisabled ? { click: prevPage } : {}">
                    <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" role="presentation" v-bind:disabled="navigationDisabled">
                        <i class="material-icons" role="presentation">arrow_back</i>
                    </button>
                    Newer
                </a>
                
                <div class="section-spacer"></div>
                <div v-show="showLoading" class="mdl-spinner mdl-js-spinner is-active"></div>
                <span v-show="!showLoading">@{{page}} / @{{pages}}</span>
                <div class="section-spacer"></div>
                
                <a href="#" v-bind:class="[{ disabled: navigationDisabled, invisible: page === pages}, 'demo-nav__button']" title="show older" v-on="!navigationDisabled ? { click: nextPage } : {}">
                    Older
                    <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" role="presentation" v-bind:disabled="navigationDisabled">
                        <i class="material-icons" role="presentation">arrow_forward</i>
                    </button>
                </a>
            </nav>
        </div>

        <x-footer/>
    </main>

    <div class="mdl-layout__obfuscator"></div>
</div>
@endsection