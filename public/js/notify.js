/*
 * Created By Dedi Fardiyanto
 * Copyright (c) 2020, Inc - All Rights Reserved
 * @Filename notify.js
 * @LastModified 09/05/2020, 13:28
 */

// A "stack" controls the direction and position
// of a notification. Here we create an array w
// with several custom stacks that we use later

var Stacks = {
    stack_top_right: {
        "dir1": "down",
        "dir2": "left",
        "push": "top",
        "spacing1": 10,
        "spacing2": 10
    },
    stack_top_left: {
        "dir1": "down",
        "dir2": "right",
        "push": "top",
        "spacing1": 10,
        "spacing2": 10
    },
    stack_bottom_left: {
        "dir1": "right",
        "dir2": "up",
        "push": "top",
        "spacing1": 10,
        "spacing2": 10
    },
    stack_bottom_right: {
        "dir1": "left",
        "dir2": "up",
        "push": "top",
        "spacing1": 10,
        "spacing2": 10
    },
    stack_bar_top: {
        "dir1": "down",
        "dir2": "right",
        "push": "top",
        "spacing1": 0,
        "spacing2": 0
    },
    stack_bar_bottom: {
        "dir1": "up",
        "dir2": "right",
        "spacing1": 0,
        "spacing2": 0
    },
    stack_context: {
        "dir1": "down",
        "dir2": "left",
        "context": $("#stack-context")
    },
}

function findWidth(noteStack) {
    if (noteStack == "stack_bar_top") {
        return "100%";
    }
    if (noteStack == "stack_bar_bottom") {
        return "70%";
    } else {
        return "290px";
    }
}

let title, typeNotif, noteStack;
function notifAllowed(status) {

    noteStack = 'stack_bar_top';
    if (status == 'permission') {
        title = 'Notification Allowed';
        typeNotif = 'system';
    } else {
        title = 'Notification Not Allowed';
        typeNotif = 'danger';
    }
    new PNotify({
        title: title,
        text: 'Well Done. this device allowed to get notif ^_^',
        shadow: true,
        opacity: 1,
        addclass: noteStack,
        type: typeNotif,
        stack: Stacks[noteStack],
        width: findWidth(noteStack),
        delay: 3000
    });
}

function showNotif(payload) {
    let data = JSON.parse(payload.data.data);
    noteStack = 'stack_bar_bottom';
    new PNotify({
        title: data.title,
        text: data.message,
        shadow: true,
        opacity: 1,
        addclass: noteStack,
        type: 'system',
        stack: Stacks[noteStack],
        width: findWidth(noteStack),
        delay: 30000
    });
}
