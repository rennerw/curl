var menu = document.querySelectorAll("ul.treeview-menu");

menu.forEach(function(e){
    if(e.querySelectorAll("li").length == 0){
        e.parentNode.remove();
    }
});