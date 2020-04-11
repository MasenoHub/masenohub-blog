<template>
  <div class="mdl-color-text--grey-700 mdl-card__supporting-text">
    <p>Welcome to our community!</p>
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
            <input class="mdl-textfield__input" type="email" name="email" id="email" required>
            <label class="mdl-textfield__label" for="email">Your email...</label>
            <span class="mdl-textfield__error">Enter a valid email address!</span>
        </div>
    </p>
    <p>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="password" name="password" id="password">
            <label class="mdl-textfield__label" for="password">Create a new password...</label>
            <span class="mdl-textfield__error">Enter your password!</span>
        </div>
    </p>
    <p>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="password" name="confirm" id="confirm">
            <label class="mdl-textfield__label" for="confirm">Confirm your new password...</label>
            <span class="mdl-textfield__error">Passwords do not match!</span>
        </div>
    </p>
    <button class="mdl-button mdl-js-button mdl-button--accent" type="submit">Register</button>
  </div>
</template>

<script>
export default {

}
</script>