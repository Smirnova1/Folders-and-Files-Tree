$(document).ready(function () {
    let tree = $('#tree-container').jstree({
        'core' : {
            'check_callback': true,
        },
        "plugins": ["types", "contextmenu", "json_data"],
        "contextmenu":{
            "items": function($node) {
                return {
                    "Create": {
                        "separator_before": false,
                        "separator_after": false,
                        "label": "Create",
                        "action": function (obj) {
                            $node = tree.jstree('create_node', $node);
                            tree.jstree('edit', $node);
                        }
                    },
                    "Rename": {
                        "separator_before": false,
                        "separator_after": false,
                        "label": "Rename",
                        "action": function (obj) {
                            tree.jstree('edit', $node);
                        }
                    },
                    "Remove": {
                        "separator_before": false,
                        "separator_after": false,
                        "label": "Remove",
                        "action": function (obj) {
                            tree.jstree('delete_node', $node);
                        }
                    }
                };
            }
        }
    });
});