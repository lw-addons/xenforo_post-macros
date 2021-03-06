!function ($, window, document, _undefined) {
    XenForo.MacrosButtons = function ($textarea) {
        this.__construct($textarea);
    };
    XenForo.MacrosButtons.prototype =
    {
        __construct: function ($textarea) {
            this.textarea = $textarea;

            $(document).bind(
                {
                    EditorInit: $.context(this, 'editorInitFunc')
                });
        },

        editorInitFunc: function (e, data) {
            this.$xenEditor = data;
            var self = this;

            if (data.$textarea[0] == this.textarea[0] && data.editor.options.macros) {
                var macrosDropdown = {
                    'user-0': {
                        title: 'User Macros',
                        style: 'opacity: 0.6; text-decoration: underline;'
                    }
                };

                $.each(data.editor.options.macros.user, function (k, v) {
                    macrosDropdown['user-' + k] = {
                        title: v.title,
                        callback: $.context(self, 'insertMacroInternal')
                    }
                });

                macrosDropdown['admin-0'] = {
                    title: 'Admin Macros',
                    style: 'opacity: 0.6; text-decoration: underline;'
                };

                $.each(data.editor.options.macros.admin, function (k, v) {
                    macrosDropdown['admin-' + k] = {
                        title: v.title,
                        callback: $.context(self, 'insertMacroInternal')
                    }
                });

                console.log(data.editor.options.macrosMode);

                switch (data.editor.options.macrosMode) {
                    case 'insert-modal':
                        data.config.buttonsCustom.insert.dropdown['macros_button'] = {
                            callback: $.context(this, 'macrosButtonCallback'),
                            title: this.$xenEditor.editor.getText('liam_postMacros_macro'),
                            className: 'icon insertMacro'
                        };
                        break;
                    case 'modal':
                        data.config.buttons.push(['macros_button']);

                        data.config.buttonsCustom['macros_button'] = {
                            callback: $.context(this, 'macrosButtonCallback'),
                            title: this.$xenEditor.editor.getText('liam_postMacros_insert_macro'),
                            className: 'icon insertMacro'
                        };
                        break;
                    case 'embedded':
                        data.config.buttons.push(['macros_button']);

                        data.config.buttonsCustom['macros_button'] = {
                            //callback: $.context(this, 'macrosButtonCallback'),
                            func: 'show',
                            title: this.$xenEditor.editor.getText('liam_postMacros_insert_macro'),
                            //className: 'fa fa-clone',
                            dropdown: macrosDropdown
                        };
                        break;
                    default:
                        console.error("Invalid macros mode!");
                }

            }
        },

        insertMacroInternal: function (ed, e, macroId, type) {
            if (typeof type === 'undefined') {
                var data = macroId.split('-');

                type = data[0];
                macroId = data[1];
            }

            XenForo.ajax("index.php?post-macros/use", {
                'macro_id': macroId,
                'render': 1,
                'type': type,
                'formAction': ed.$el.closest('form').attr('action')
            }, function (ajaxData, textStatus) {
                if (ajaxData.macroContent) {
                    ed.execCommand('inserthtml', ajaxData.macroContent.toString());
                }

                var $titleField = $('#ctrl_title_thread_create');
                if (ajaxData.threadTitle && $titleField && $titleField.val() == "") {
                    $titleField.val(ajaxData.threadTitle);
                }

                if (ajaxData.lockThread) {
                    console.log('Locking thread');
                    var existingLockInput = $('#ctrl_macros_set_locked');
                    if (existingLockInput) existingLockInput.remove();
                    $('<input id="ctrl_macros_set_locked" type="hidden" name="macros_set_locked" value="1" />').appendTo(ed.$el.closest('form'));
                }

                if (ajaxData.threadPrefix) {
                    console.log('Setting prefix...');
                    var existingPrefixInput = $('#ctrl_macros_set_prefix');
                    if (existingPrefixInput) existingPrefixInput.remove();

                    var prefixSelect = $('ctrl_prefix_id_thread_create');
                    if (prefixSelect) prefixSelect.val(ajaxData.threadPrefix);

                    $('<input id="ctrl_macros_set_prefix" type="hidden" name="macros_set_prefix" value="' + ajaxData.threadPrefix + '" />').appendTo(ed.$el.closest('form'));
                }

                ed.syncCode();
                ed.modalClose();
            });
        },

        macrosButtonCallback: function (ed) {
            var self = this;

            ed.modalInit(this.$xenEditor.editor.getText('liam_postMacros_insert_macro'), {url: this.$xenEditor.editor.dialogUrl + '&dialog=liam_postmacros'}, 600, $.proxy(function () {
                $('#liam_postmacros_insert_btn').click(function (e) {
                    e.preventDefault();
                    self.insertMacro(e, ed);
                });

                setTimeout(function () {
                    self.$macroSelect = $('#liam_postmacros_select');
                    self.$macroSelect.focus();
                }, 100);
            }), ed);
        },

        insertMacro: function (e, ed) {
            var self = this;

            self.macroForm = ed.$el.closest('form');
            var macroId = self.$macroSelect.val();

            if (macroId == 0) {
                return;
            }

            this.insertMacroInternal(ed, e, macroId, self.$macroSelect.find(':selected').data('type'));
        },

        escape: function (str) {
            return str.replace(/(:|\.|\[|\]|,)/g, "\\$1");
        }
    };

    XenForo.register('textarea.BbCodeWysiwygEditor', 'XenForo.MacrosButtons');

}(jQuery, this, document);