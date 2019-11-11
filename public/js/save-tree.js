$(document).ready(function () {
    $('#save').on('click', function() {
        let warning = confirm('Unfortunately, the save function is not finalized. Additional folders will be added to your data, which may incorrectly display information the next time you view it. Are you sure you want to save?');
        if(!warning){
            return false;
        }
        saveTree();
    });

    function saveTree () {
        let json = $('#tree-container').jstree(true).get_json('#', {no_id:true});
        clear(json);
        let res = JSON.stringify(json, ["text", "children"]);
        document.getElementById("result").value =res;
    }

    function clear(obj) {
        for (let key in obj) {
            if (!obj[key] || typeof obj[key] !== "object") {
                continue
            }
            clear(obj[key]);
            if (Object.keys(obj[key]).length === 0) {
                delete obj[key];
            }
        }
    }
});