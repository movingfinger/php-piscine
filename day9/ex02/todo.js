var ft_list;
var cookie = [];
window.onload = function() {
   document.querySelector("#new").addEventListener("click", newItem);
   ft_list = document.querySelector("#ft_list");
   var tmp = document.cookie;
   if (tmp) {
       cookie = JSON.parse(tmp);
       cookie.forEach(function(c) {
           addItem(c);
       });
   }
};
window.onunload = function() {
   var todo = ft_list.children;
   var newCookie = [];
   for (var i = 0; i < todo.length; i++)
       newCookie.unshift(todo[i].innerHTML);
   document.cookie = JSON.stringify(newCookie);
};
function newItem() {
   var todo = prompt("To add to To Do List: ", '');
   if (todo != '')
       addItem(todo);
}
function addItem(todo) {
   var div = document.createElement("div");
   div.innerHTML = todo;
   div.addEventListener("click", deleteItem);
   ft_list.insertBefore(div, ft_list.firstChild);
}
function deleteItem() {
   if (confirm("To Remove from To Do List: "))
       this.parentElement.removeChild(this);
}
