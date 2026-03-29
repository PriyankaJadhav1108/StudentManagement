/**
 * Student Management — client-side JS (syllabus: DOM, events, validation, strings, loops)
 */
(function () {
    'use strict';

    function validateEmail(email) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(String(email).trim());
    }

    function initDashboard() {
        var table = document.getElementById('studentTable');
        var input = document.getElementById('searchInput');
        var visibleEl = document.getElementById('visibleCount');
        var totalEl = document.getElementById('totalCount');
        if (!table || !input) {
            return;
        }

        var tbody = table.querySelector('tbody');
        if (!tbody) {
            return;
        }

        var rows = tbody.querySelectorAll('tr');

        function visibleTotal() {
            var visible = 0;
            for (var i = 0; i < rows.length; i++) {
                if (!rows[i].hidden) {
                    visible += 1;
                }
            }
            if (visibleEl) {
                visibleEl.textContent = visible;
            }
        }

        function applyFilter() {
            var q = input.value.trim().toLowerCase();
            var i;
            var tr;
            var text;
            for (i = 0; i < rows.length; i++) {
                tr = rows[i];
                text = tr.textContent.toLowerCase().replace(/\s+/g, ' ');
                tr.hidden = q !== '' && text.indexOf(q) === -1;
            }
            visibleTotal();
        }

        input.addEventListener('input', applyFilter);
        visibleTotal();

        tbody.addEventListener('click', function (e) {
            if (e.target.closest('a')) {
                return;
            }
            var tr = e.target.closest('tr');
            if (!tr) {
                return;
            }
            for (var j = 0; j < rows.length; j++) {
                rows[j].classList.remove('row-selected');
            }
            tr.classList.add('row-selected');
        });

        var deleteLinks = table.querySelectorAll('.link-delete');
        for (var k = 0; k < deleteLinks.length; k++) {
            deleteLinks[k].addEventListener('click', function (ev) {
                if (!window.confirm('Delete this student? This cannot be undone.')) {
                    ev.preventDefault();
                }
            });
        }

        if (totalEl && totalEl.textContent === '') {
            totalEl.textContent = String(rows.length);
        }
    }

    function initLoginForm() {
        var form = document.getElementById('loginForm');
        if (!form) {
            return;
        }
        form.addEventListener('submit', function (e) {
            var userInput = form.querySelector('[name="username"]');
            var passInput = form.querySelector('[name="password"]');
            var u = userInput ? userInput.value.trim() : '';
            var p = passInput ? passInput.value.trim() : '';
            if (!u || !p) {
                e.preventDefault();
                window.alert('Please enter both username and password.');
            }
        });
    }

    function initFlashMessage() {
        var body = document.body;
        if (!body) {
            return;
        }
        var msg = body.getAttribute('data-flash-message');
        if (!msg) {
            return;
        }
        body.removeAttribute('data-flash-message');
        window.setTimeout(function () {
            window.alert(msg);
            if (window.history && window.history.replaceState) {
                window.history.replaceState(null, '', window.location.pathname);
            }
        }, 0);
    }

    function initStudentForm(formId) {
        var form = document.getElementById(formId);
        if (!form) {
            return;
        }
        form.addEventListener('submit', function (e) {
            var nameEl = form.querySelector('[name="name"]');
            var emailEl = form.querySelector('[name="email"]');
            var courseEl = form.querySelector('[name="course"]');
            var name = nameEl ? nameEl.value.trim() : '';
            var email = emailEl ? emailEl.value.trim() : '';
            var course = courseEl ? courseEl.value.trim() : '';

            if (!name) {
                e.preventDefault();
                window.alert('Name cannot be empty.');
                return;
            }
            if (!email) {
                e.preventDefault();
                window.alert('Email cannot be empty.');
                return;
            }
            if (!validateEmail(email)) {
                e.preventDefault();
                window.alert('Please enter a valid email address (e.g. name@example.com).');
                return;
            }
            if (!course) {
                e.preventDefault();
                window.alert('Course cannot be empty.');
                return;
            }
        });
    }

    document.addEventListener('DOMContentLoaded', function () {
        initFlashMessage();
        initDashboard();
        initLoginForm();
        initStudentForm('addStudentForm');
        initStudentForm('editStudentForm');
    });
})();
