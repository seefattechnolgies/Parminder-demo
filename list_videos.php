<style type="text/css">
    .mow-connected{
        width:100%
    }
    .connect-mowplayer{
        float: right;
        margin-top: 10px;
    }
    .mt-15{
        margin-top:10px;
    }
</style>
<div class="wrap">
    <h1 class="wp-heading-inline">Mowplayer</h1>
    <a href="#" class="page-title-action connect-mowplayer">Switch Account</a>&nbsp;&nbsp;
    <button class="page-title-action refresh-mowplayer">Update</button>
    <br class="clear">
    <table class="wp-list-table widefat fixed striped mt-15 mow-video-list">
        <thead>
            <tr>
                <th class="manage-column" style="width:100px"> </th>	
                <th class="manage-column"><strong>Title</strong></th>	
                <th class="manage-column"><strong>Category</strong></th>	
                <th class="manage-column"><strong>Description</strong></th>	
                <th class="manage-column"><strong>Autoplay</strong></th>	
                <th class="manage-column"><strong>Duration</strong></th>	

            </tr>
        </thead>

        <tbody>

            <?php foreach ($videos as $video) { ?>
                <tr>
                    <td><img src="<?php echo $video->thumbnail ?>"></td>	
                    <td><span class="title"><?php echo $video->title ?></span></td>
                    <td><?php echo $video->category ?></td>
                    <td><?php echo $video->description ?></td>
                    <td><?php echo ($video->autoplay == 1 ? 'ON' : 'OFF') ?></td>
                    <td><?php echo $video->duration ?></td>
                </tr>
            <?php } ?>

        </tbody>

    </table>
</div>
<script>

    var mow_connect_account_window = null;
    var redirect_url = window.location.origin + window.location.pathname + "?page=mow_check_login";
    var refresh_url = window.location.origin + window.location.pathname + "?page=mow_update_videos";

    document.querySelector('.connect-mowplayer').addEventListener('click', function (e) {

        e.preventDefault();

        if (mow_connect_account_window !== null) {
            mow_connect_account_window.close();
        }

        mow_connect_account_window = window.open('<?php echo MOW_LOGIN_URL ?>' + encodeURI(redirect_url), 'Connect mowplayer', 'height=600,width=500');

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

    });

    document.querySelector('button.refresh-mowplayer').addEventListener('click', function (e) {
        e.preventDefault();
        this.innerHTML = 'Updating...';
        this.disabled = true;
        var xhr = new XMLHttpRequest();
        xhr.open("GET", refresh_url, true);
        var $this = this;
        xhr.onload = function (e) {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    location.reload();
                }
            }
        }
        xhr.onerror = function (e) {
            location.reload();
        };

        xhr.send(null);
        return false;
    });
</script>