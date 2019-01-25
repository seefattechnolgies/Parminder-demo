<?php
if (!defined('ABSPATH'))
    exit;

header('Content-Type: text/javascript');

$tinyMce = new mowplayer_TinyMCESelector();

global $wpdb;

$videos = $wpdb->get_results("SELECT code,title FROM " . $wpdb->prefix . "mowplayer_videos  ORDER BY id DESC", ARRAY_A);

if (count($videos) == 0)
    die;

if (floatval(get_bloginfo('version')) >= 3.9) {

    ?>
    (function() {

        tinymce.PluginManager.add('<?php echo $tinyMce->buttonName; ?>', function( editor, url ) {
        editor.addButton('<?php echo $tinyMce->buttonName; ?>', {
            title: 'MowPlayer',
            type: 'menubutton',
            icon: 'icon mow-own-icon',
        menu: [
                <?php foreach ($videos as $key => $val) { ?>            
                    {
                        text: '<?php echo addslashes($val['title']); ?>',
                        value: '[mow-code snippet="<?php echo addslashes($val['code']); ?>"]',
                        onclick: function() {
                           editor.insertContent(this.value());
                        }
                    },
                <?php } ?>           		
                ]
            });
        });

    })();
    <?php
} else {

    $snpts = array(
        'title' => 'MowPlayer',
        'url' => plugins_url('images/logo.png', MOWPLAYER_PLUGIN_FILE),
        'mow_snippets' => $videos
    );
    ?>

    var tinymce_<?php echo $tinyMce->buttonName; ?> =<?php echo json_encode($xyz_snippets) ?>;


    (function() {
        tinymce.create('tinymce.plugins.<?php echo $tinyMce->buttonName; ?>', {
            init : function(ed, url) {
            tinymce_<?php echo $tinyMce->buttonName; ?>.insert = function(){
                    if(this.v && this.v != ''){
                        tinymce.execCommand('mceInsertContent', false, '[mow snippet="'+tinymce_<?php echo $tinyMce->buttonName; ?>.mow_snippets[this.v]['title']+'"]');
                    }
                };
            },
            createControl : function(n, cm) {
                if(n=='<?php echo $tinyMce->buttonName; ?>'){
                
                    var c = cm.createSplitButton('<?php echo $tinyMce->buttonName; ?>', {
                        title : tinymce_<?php echo $tinyMce->buttonName; ?>.title,
                        image :  tinymce_<?php echo $tinyMce->buttonName; ?>.url,
                        onclick : tinymce_<?php echo $tinyMce->buttonName; ?>.insert
                    });
                    
                    c.onRenderMenu.add(function(c, m){
                        for (var id in tinymce_<?php echo $tinyMce->buttonName; ?>.mow_snippets){
                            m.add({
                                v : id,
                                title : tinymce_<?php echo $tinyMce->buttonName; ?>.mow_snippets[id]['title'],
                                onclick : tinymce_<?php echo $tinyMce->buttonName; ?>.insert
                            });
                        }
                    });

            return c;
        }
        return null;
    },

    });

    tinymce.PluginManager.add('<?php echo $tinyMce->buttonName; ?>',tinymce.plugins.<?php echo $tinyMce->buttonName; ?>);
    })();

<?php } ?>
