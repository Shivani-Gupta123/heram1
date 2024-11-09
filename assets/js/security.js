document.addEventListener("contextmenu", function (e) {
    console.log("ctx menu button:", e.which);

    // Stop the context menu
    e.preventDefault();
});

document.addEventListener("mousedown", function (e) {
    console.log("normal mouse down:", e.which);
});

document.addEventListener("mouseup", function (e) {
    console.log("normal mouse up:", e.which);
});

document.onkeydown = function (e) {
    e = e || window.event; // Get event
    if (e.ctrlKey) {
        var c = e.which || e.keyCode; // Get key code
        switch (c) {
            case 83: // Block Ctrl+S
                e.preventDefault();
                e.stopPropagation();
                break;
        }
    }

    if (event.keyCode == 123) {
        return false;
    }
    if (e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
        return false;
    }
    if (e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
        return false;
    }
    if (e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
        return false;
    }
    if (e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
        return false;
    }
};

document.addEventListener("keyup", function (e) {
    var keyCode = e.keyCode ? e.keyCode : e.which;
    if (keyCode == 44) {
        stopPrntScr();
    }
});

function stopPrntScr() {
    var inpFld = document.createElement("input");
    inpFld.setAttribute("value", ".");
    inpFld.setAttribute("width", "0");
    inpFld.style.height = "0px";
    inpFld.style.width = "0px";
    inpFld.style.border = "0px";
    document.body.appendChild(inpFld);
    inpFld.select();
    document.execCommand("copy");
    inpFld.remove(inpFld);
}

function AccessClipboardData() {
    try {
        window.clipboardData.setData('text', "Access   Restricted");
    } catch (err) {}
}
setInterval(AccessClipboardData, 300);
