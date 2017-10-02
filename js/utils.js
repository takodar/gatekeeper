function loadGateKeeper(right) {

    var width = viewportSize.getWidth();
    var height = viewportSize.getHeight();

    if(width < 460 || height < 676)
    {
        document.location.href = 'https://gatekeeperpro.com/gk/';
        return;
    }

    var passBox = new Gk_CreateEl('div'), logo = new Gk_CreateEl('img');
    passBox.getEl().className = 'cleanslate';
    passBox.setAttributes([
        ['id', 'av_pass_box']
    ]);
    passBox.setStyle([
        ['zIndex', '99999'],
        ['position', 'absolute'],
        ['top', '0px'],
        ['right', right + 'px'],
        ['width', '460px'],
        ['margin', '10px'],
        ['padding', '0'],
        ['background', '#CEDCE3'],
        ['borderStyle', 'solid'],
        ['borderColor', '#CEDCE3 '],
        ['borderWidth', '12px'],
        ['borderRadius', '15px'],
        ['boxShadow', '1px 1px 5px 10px #1879D1'],
        ['opacity', '0.95'],
        ['filter', 'alpha(opacity=95)'],
        ['visibility', 'visible']
    ]);

    ParentDiv = passBox.getEl();
    var passBoxBorder = new Gk_CreateEl('div');
    passBoxBorder.setAttributes([
        ['id', 'av_pass_box_header']
    ]);
    passBoxBorder.setStyle([
        ['borderRadius', '10px 10px 0px 0px'],
        ['margin', '0'],
        ['padding', '7px 5px 5px 7px'],
        ['width', 'auto'],
        ['background', '#1C6393'],
        ['color', ' #ffffff'],
        ['font', 'bold 12px Tahoma, Trebuchet MS, Helvetica,sans-serif'],
        ['fontWeight', 'bold'],
        ['cursor', 'move']
    ]);

    var closeLink = new Gk_CreateEl('a');
    closeLink.setStyle([
        ['font', '11px Trebuchet MS, Helvetica,sans-serif'],
        ['color', 'white'],
        ['fontWeight', 'normal'],
        ['textDecoration', 'underline'],
        ['borderWidth', '0'],
        ['cursor', 'pointer'],
        ['position', 'absolute'],
        ['right', '10px']
    ]);
    closeLink.setMethods([
        ['click', av_close]
    ]);
    closeLink.addChildren([document.createTextNode('close')]);

    logo.setAttributes([
        ['src', 'https://trssolutions.net/img/gatekeeper-logo-grn-122x25.png']
    ]);

    passBoxBorder.setMethods([
        ['mousedown', av_drag_start]
    ]);
    passBoxBorder.addChildren([logo.getEl(), closeLink.getEl()]);

    var gateKeeperiFrame = new Gk_CreateEl('iframe');
    gateKeeperiFrame.setAttributes([
        ['src', 'https://gatekeeperpro.com/gk/'],
        ['frameborder', '0'],
        ['scrolling', 'yes'],
        ['width', '460'],
        ['height', '676']
    ]);

    var passBoxChild = new Gk_CreateEl('div');
    passBoxChild.setAttributes([
        ['id', 'av_pass_box_child']
    ]);
    passBoxChild.setStyle([
        ['margin', '0'],
        ['padding', '0'],
        ['borderRadius', '0 0 10px 10px'],
        ['textAlign', 'left'],
        ['background', '#1879D1']
    ]);
    passBoxChild.addChildren([gateKeeperiFrame.getEl()]);
    passBox.addChildren([passBoxBorder.getEl(), passBoxChild.getEl()]);
    document.body.appendChild(ParentDiv);

    if (document.getElementById('av_user_div')) {
        document.getElementById('av_user_div').focus();
    }
}

function Gk_CreateEl(name) {
    var element = document.createElement(name);

    this.getEl = function () {
        return element;
    };
}

Gk_CreateEl.prototype.setAttributes = function (attributes) {
    var i = 0;
    for (i = 0; i < attributes.length; i = i + 1) {
        this.getEl().setAttribute(attributes[i][0], attributes[i][1]);
    }
};

Gk_CreateEl.prototype.setStyle = function (styles) {
    var i = 0;
    for (i = 0; i < styles.length; i = i + 1) {
        this.getEl().style[styles[i][0]] = styles[i][1];
    }
};

Gk_CreateEl.prototype.setMethods = function (methods) {
    var i = 0;
    for (i = 0; i < methods.length; i = i + 1) {
        av_attach_method(this.getEl(), methods[i][0], methods[i][1]);
    }
};

Gk_CreateEl.prototype.addChildren = function (children) {
    var i = 0;
    for (i = 0; i < children.length; i = i + 1) {
        this.getEl().appendChild(children[i]);
    }
};

function av_get_cursor(e) {
    var x = 0,
        y = 0;
    if (e.pageX || e.pageY) {
        x = e.pageX;
        y = e.pageY;
    }
    else if (e.clientX || e.clientY) {
        x = e.clientX + document.body.scrollLeft;
        y = e.clientY + document.body.scrollTop;
    }
    return [x, y];
}

function av_drag_go(e) {
    var CursorMove = av_get_cursor(e);
    DragBox.Node.style.right = (DragBox.StartX + (DragBox.CursorX - CursorMove[0])) + 'px';
    DragBox.Node.style.top = (DragBox.StartY + (CursorMove[1] - DragBox.CursorY)) + 'px';
    e.preventDefault();
    return false;
}

function av_drag_stop(e) {
    av_detach_method(document, 'mousemove', av_drag_go);
    av_detach_method(document, 'mouseup', av_drag_stop);
    e.preventDefault();
    return false;
}

function av_drag_start(e) {
    DragBox = {};
    var Cursor = av_get_cursor(e);
    DragBox.Node = document.getElementById('av_pass_box');
    if (!(DragBox.Node.style.right)) {
        DragBox.Node.style.left = 'auto';
        DragBox.Node.style.right = av_get_computed_style(DragBox.Node, 'right');
    }
    DragBox.StartX = parseInt(DragBox.Node.style.right, 10);
    DragBox.StartY = parseInt(DragBox.Node.style.top, 10);
    DragBox.CursorX = Cursor[0];
    DragBox.CursorY = Cursor[1];
    av_attach_method(document, 'mousemove', av_drag_go);
    av_attach_method(document, 'mouseup', av_drag_stop);
    e.preventDefault();
    e.stopPropagation();
    return false;
}

function av_close(e) {
    if (document.getElementById('av_pass_box')) {
        document.body.removeChild(document.getElementById('av_pass_box'));
    }
}

av_detach_method.handlers = [];
function av_attach_method(obj, type, fn) {
    var handler = function (e) {
        e = e || window.event;
        if (!e.stopPropagation) {
            e.stopPropagation = function () {
                this.cancelBubble = true;
            };
        }
        if (!e.preventDefault) {
            e.preventDefault = function () {
                this.returnValue = false;
            };
        }
        if (!e.stopEvent) {
            e.stopEvent = function () {
                this.stopPropagation();
                this.preventDefault();
            };
        }
        return fn.apply(obj, [e]);
    };
    handler.obj = obj;
    handler.type = type;
    handler.fn = fn;
    av_detach_method.handlers.push(handler);
    if (window.addEventListener) {
        obj.addEventListener(type, handler, false);
    }
    else if (window.attachEvent) {
        obj.attachEvent('on' + type, handler);
    }
    return handler;
}

function av_detach_method(obj, type, fn) {
    var i,
        h;
    for (i = 0; i < av_detach_method.handlers.length; i = i + 1) {
        h = av_detach_method.handlers[i];
        if (h.obj === obj && h.type === type && h.fn === fn) {
            if (obj.removeEventListener) {
                obj.removeEventListener(h.type, h, false);
            }
            if (obj.detachEvent) {
                obj.detachEvent('on' + h.type, h);
            }
            av_detach_method.handlers.splice(i, 1);
            return h;
        }
    }
}