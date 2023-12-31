<div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-header">

    <!-- Header section containing title -->
    <header class="mdl-layout__header mdl-color-text--white mdl-color--light-blue-700">
        <div class="mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-grid">
            <div class="mdl-layout__header-row mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--8-col-desktop">
                <h3>Firebase Cloud Messaging</h3>
            </div>
        </div>
    </header>

    <main class="mdl-layout__content mdl-color--grey-100">
        <div class="mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-grid">

            <!-- Container for the Table of content -->
            <div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
                <div class="mdl-card__supporting-text mdl-color-text--grey-600">
                    <!-- div to display the generated Instance ID token -->
                    <div id="token_div" style="display: none;">
                        <h4>Instance ID Token</h4>
                        <p id="token" style="word-break: break-all;"></p>
                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored"
                                onclick="deleteToken()">Delete Token</button>
                    </div>
                    <!-- div to display the UI to allow the request for permission to
                         notify the user. This is shown if the app has not yet been
                         granted permission to notify. -->
                    <div id="permission_div" style="display: none;">
                        <h4>Needs Permission</h4>
                        <p id="token"></p>
                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored"
                                onclick="requestPermission()">Request Permission</button>
                    </div>
                    <!-- div to display messages received by this app. -->
                    <div id="messages"></div>
                </div>
            </div>

        </div>
    </main>
</div>
