<style type="text/css">
    .mow-not-connected{
        margin: 50px auto;
        text-align: center;
    }
    .mow-not-connected p{
        padding-top: 10px;
        padding-bottom: 20px;
    }
    .mow-not-connected:after{
        clear: both;
    }
</style>

<div class="wrap">
    <h1 class="wp-heading-inline">Mowplayer</h1>	
    <div class="card mow-not-connected">
        <h2 class="title">You're not connected with mowplayer.com</h2>
        <p>Click bellow link to connect account!</p>
        <a href="#" class="page-title-action connect-mowplayer">Connect Account</a>
    </div>
</div>
<script>

    var mow_connect_account_window = null;
    var redirect_url = window.location.origin + window.location.pathname + "?page=mow_check_login";

    document.querySelector('.connect-mowplayer').addEventListener('click', function (e) {

        e.preventDefault();

        if (mow_connect_account_window !== null) {
            mow_connect_account_window.close();
        }

        mow_connect_account_window = window.open('<?php echo MOW_LOGIN_URL; ?>' + encodeURI(redirect_url), 'Connect mowplayer', 'height=600,width=500');

        if (window.focus) {
            mow_connect_account_window.focus();
        }

        var closeTimer2 = setInterval(function () {

            if ((mow_connect_account_window != undefined) && (mow_connect_account_window.closed)) {
                clearInterval(closeTimer2);
                location.reload();
            }

        }, 100)

        return false;

    })
</script>