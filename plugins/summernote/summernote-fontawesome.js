(function (factory) {
  if (typeof define === 'function' && define.amd) {
    define(['jquery'], factory);
  } else if (typeof module === 'object' && module.exports) {
    module.exports = factory(require('jquery'));
  } else {
    factory(window.jQuery);
  }
}(function ($) {

  /**
   * Support font-awesome icon class name
   */
  $.extend($.summernote.options.icons ,  {
    'align': 'fa fa-align',
    'alignCenter': 'fa fa-align-center',
    'alignJustify': 'fa fa-align-justify',
    'alignLeft': 'fa fa-align-left',
    'alignRight': 'fa fa-align-right',
    'indent': 'fa fa-indent',
    'outdent': 'fa fa-outdent',
    'arrowsAlt': 'fa fa-arrows-alt',
    'bold': 'fa fa-bold',
    'caret': 'fa fa-caret-down',
    'circle': 'fa fa-circle',
    'close': 'fa fa fa-close',
    'code': 'fa fa-code',
    'eraser': 'fa fa-eraser',
    'font': 'fa fa-font',
    'italic': 'fa fa-italic',
    'link': 'fa fa-link',
    'unlink': 'fa fa-chain-broken',
    'magic': 'fa fa-magic',
    'menuCheck': 'fa fa-check',
    'minus': 'fa fa-minus',
    'orderedlist': 'fa fa-list-ol',
    'pencil': 'fa fa-pencil',
    'picture': 'fa fa-picture-o',
    'question': 'fa fa-question',
    'redo': 'fa fa-repeat',
    'square': 'fa fa-square',
    'strikethrough': 'fa fa-strikethrough',
    'subscript': 'fa fa-subscript',
    'superscript': 'fa fa-superscript',
    'table': 'fa fa-table',
    'textHeight': 'fa fa-text-height',
    'trash': 'fa fa-trash-o',
    'underline': 'fa fa-underline',
    'undo': 'fa fa-undo',
    'unorderedlist': 'fa fa-list-ul',
    'video': 'fa fa-video-camera',
    'note-close': 'fa fa-video-camera'
  });

}));
