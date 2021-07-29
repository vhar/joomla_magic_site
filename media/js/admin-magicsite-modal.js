(function() {
  "use strict";
  window.jSelectItem = function (id, title, category, alias, link) {
    var tag;

    if (!Joomla.getOptions('xtd-magicsite')) {
      window.parent.jModalClose();
      return false;
    }

    tag = '<a href="' + link + '">' + title + '</a>';
    window.parent.jModalClose();
  };

  document.addEventListener('DOMContentLoaded', function(){
    // Get the elements
    var elements = document.querySelectorAll('.select-link');

    for(var i = 0, l = elements.length; l>i; i++) {
      // Listen for click event
      elements[i].addEventListener('click', function (event) {
        event.preventDefault();
        var functionName = event.target.getAttribute('data-function');
        window.parent[functionName](event.target.getAttribute('data-id'), event.target.getAttribute('data-title'), event.target.getAttribute('data-category'), event.target.getAttribute('data-alias'), event.target.getAttribute('data-uri'));
      })
    }
  });
})();
