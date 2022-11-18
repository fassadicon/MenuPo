<x-admin.layout>
    <div class="container part2">
        <div class="card">
            <h1>Greens</h1>
            <h3 id="green1"></h3>
            <h3 id="green2"></h3>
            <h3 id="green3"></h3>
        </div>
        <div class="card">
            <h1>Ambers</h1>
            <h3 id="amber1"></h3>
            <h3 id="amber2"></h3>
        </div>
        <div class="card">
            <h1>Reds</h1>
            <h3 id="red1"></h3>
            <h3 id="red2"></h3>
        </div>
        <div class="card">
            <h1>Grays</h1>
            <h3 id="gray1"></h3>
        </div>

        <a class="btn btn-info" id="shuffle">Shuffle</a>
        <a class="btn btn-warning" id="publish">Publish</a>
    </div>
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
</x-admin.layout>
<script>
    $(document).ready(function() {
        var numberOfTasks = 0;

        $("#add").on("click", addItem);
        $("#tasklist").on("click", ".d", deleteItem);
        $("#donelist").on("click", ".d", deleteItem);
        $("#clearAll").on("click", clearAll);
        $("#tasklist").on("click", ".checkbox", checkItem);
        $("#tasklist").sortable();
        $("#donelist").sortable();

        $(document).keypress(function(e) {
            if (e.which == 13) {
                addItem();
            }
        });

        function addItem() {
            var randomColor = 0;
            var text = $("#task").val();
            if (text === "") {
                alert("You cannot add an empty task");
            } else if (text === "snake") {
                window.location.href = "snake.html";
            } else {
                var textNoSpace = Math.random()
                    .toString(36)
                    .substring(7);
                numberOfTasks = numberOfTasks + 1;

                //To change the text which tells how many tasks are left

                tasksLeft();

                //This has to do with the item being added on

                $("#tasklist").append(
                    '<li><div class="listItem"><p><input type ="checkbox" id="' +
                    textNoSpace +
                    'check" class = "checkbox" /> <label for="' +
                    textNoSpace +
                    'check"></label>' +
                    text +
                    '<button class="d md-button" id="' +
                    textNoSpace +
                    '">Delete</button></div></li>'
                );

                do {
                    var randomColor =
                        "#" + Math.floor(Math.random() * 16777215).toString(16);
                } while (randomColor < 100000);

                $("#" + textNoSpace).css("background-color", randomColor);
                $("#task").val("");
            }
        }

        function tasksLeft() {
            document.title = "To-Do (" + numberOfTasks + ")";

            if (numberOfTasks > 1) {
                $("#tasksleft").show();
                document.getElementById("tasksleft").innerHTML =
                    "You have " + numberOfTasks + " tasks to complete.";
            } else if (numberOfTasks > 0 && numberOfTasks < 2) {
                $("#tasksleft").show();
                document.getElementById("tasksleft").innerHTML =
                    "You have " + numberOfTasks + " task to complete.";
            } else {
                document.getElementById("tasksleft").innerHTML =
                    "You have no tasks left!";
            }
        }

        function deleteItem() {
            $(this)
                .parent()
                .fadeOut(700);
            if (
                $(this)
                .parent()
                .hasClass("complete")
            ) {} else {
                numberOfTasks = numberOfTasks - 1;
            }
            tasksLeft();
        }

        function clearAll() {
            $(".complete")
                .parent()
                .fadeOut(700);
            tasksLeft();
        }

        function checkItem() {
            $(this)
                .parent()
                .addClass("complete");
            numberOfTasks = numberOfTasks - 1;
            tasksLeft();
            $("#donelist").append($(this).parent());
        }
    });


    var nav__label = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
    var text = "";
    var i;

    for (i = 0; i < nav__label.length; i++) {
        text += nav__label[i];
    }
    var Nav = (function() {
        var
            nav = $('.nav'),
            burger = $('.burger'),
            page = $('.page'),
            section = $('.section'),
            link = nav.find('.nav__link'),
            navH = nav.innerHeight(),
            isOpen = true,
            hasT = false;
        var toggleNav = function() {
            nav.toggleClass('nav--active');
            burger.toggleClass('burger--close');
            shiftPage();
        };
        var shiftPage = function() {
            if (!isOpen) {
                page.css({
                    'transform': 'translateY(' + navH + 'px)',
                    '-webkit-transform': 'translateY(' + navH + 'px)'
                });
                isOpen = true;
            } else {
                page.css({
                    'transform': 'none',
                    '-webkit-transform': 'none'
                });
                isOpen = false;
            }
        };
        var switchPage = function(e) {
            var self = $(this);
            var i = self.parents('.nav__item').index();
            var s = section.eq(i);
            var a = $('section.section--active');
            var t = $(e.target);
            if (!hasT) {
                if (i == a.index()) {
                    return false;
                }
                a
                    .addClass('section--hidden')
                    .removeClass('section--active');
                s.addClass('section--active');
                hasT = true;
                a.on('transitionend webkitTransitionend', function() {
                    $(this).removeClass('section--hidden');
                    hasT = false;
                    a.off('transitionend webkitTransitionend');
                });
            }
            return false;
        };
        var keyNav = function(e) {
            var a = $('section.section--active');
            var aNext = a.next();
            var aPrev = a.prev();
            var i = a.index();
            if (!hasT) {
                if (e.keyCode === 37) {
                    if (aPrev.length === 0) {
                        aPrev = section.last();
                    }
                    hasT = true;
                    aPrev.addClass('section--active');
                    a
                        .addClass('section--hidden')
                        .removeClass('section--active');
                    a.on('transitionend webkitTransitionend', function() {
                        a.removeClass('section--hidden');
                        hasT = false;
                        a.off('transitionend webkitTransitionend');
                    });
                } else if (e.keyCode === 39) {
                    if (aNext.length === 0) {
                        aNext = section.eq(0)
                    }
                    aNext.addClass('section--active');
                    a
                        .addClass('section--hidden')
                        .removeClass('section--active');
                    hasT = true;
                    aNext.on('transitionend webkitTransitionend', function() {
                        a.removeClass('section--hidden');
                        hasT = false;
                        aNext.off('transitionend webkitTransitionend');
                    });
                } else {
                    return
                }
            }
        };
        var bindActions = function() {
            burger.on('click', toggleNav);
            link.on('click', switchPage);
            $(document).on('ready', function() {
                page.css({
                    'transform': 'translateY(' + navH + 'px)',
                    '-webkit-transform': 'translateY(' + navH + 'px)'
                });
            });
            $('body').on('keydown', keyNav);
        };
        var init = function() {
            bindActions();
        };
        return {
            init: init
        };
    }());
    Nav.init();
    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // });
    // $('#shuffle').on('click', function() {
    //     $.ajax({
    //         type: "GET",
    //         url: "{{ url('admin/menu-suggestion/suggest') }}",
    //         success: function(data) {
    //             // console.log(data);
    //             $('#green1').text(data.greens[0].name);
    //             $('#green2').text(data.greens[1].name);
    //             $('#green3').text(data.greens[2].name);
    //             $('#amber1').text(data.ambers[0].name);
    //             $('#amber2').text(data.ambers[1].name);
    //             $('#red1').text(data.reds[0].name);
    //             $('#red2').text(data.reds[1].name);
    //             $('#gray1').text(data.grays[0].name);
    //             // $.each(data.ambers, function(i, value) {
    //             //     console.log(value.name + "\t" + value.grade);
    //             // });
    //         }
    //     });
    // });
    // $('#publish').on('click', function() {
    //     var menuList = [];
    //     menuList.push(
    //         $('#green1').text(),
    //         $('#green2').text(),
    //         $('#green3').text(),
    //         $('#amber1').text(),
    //         $('#amber2').text()
    //         // $('#red1').text(),
    //         // $('#red2').text(),
    //         // $('#gray1').text()
    //     );

    //     $.ajax({
    //         type: "POST",
    //         url: "{{ url('admin/menu-suggestion/publish') }}",
    //         data: {
    //             menuList
    //         },
    //         success: function(data) {

    //             // console.log(menuList);
    //             console.log(data);
    //         }
    //     });
    // });
</script>
