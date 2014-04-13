<?php
$this->title = 'Многопоточность';
?>
<h1>
    Ничем не делиться, но делать все :)
</h1>
<hr />
<p>
    PHP имеет большое количество расширений и функций, но был задуман в то время, когда Web-серверы были гораздо менее мощными, чем они являются сегодня. Почти каждый веб-сервер (и мобильный телефон!) имеет несколько ядер, если не несколько процессоров с несколькими ядрами. PHP не может не воспользоваться этим очень хорошо. Хотя PHP очень быстро развивается и выражает свои идеи при разработке enterprise веб-приложений, мы часто поглядываем на другие полномасштабные языки и фреймворки, чтобы написать бэкэнд или ориентированных на данные веб-приложения, потому что PHP не может воспользоваться сервером на всю его мощь, что мы имеем в нашем распоряжении. Но PHP в состоянии работать с потоками, что
    делает его реальным кандидатом для разработки enterprise приложений, и это делает свою личную страницу в состоянии сделать то, на что просто не было времени, чтобы сделать раньше.
</p>
<h2>
    Основы
</h2>
<hr />
<p>
    pthreads является объектно-ориентированным API, что позволяет пользователю использовать многопоточность в PHP. Она включает в себя все инструменты, необходимые для создания многопоточных приложений, ориентированных на веб или консоль. PHP приложения могут создавать, читать, писать и синхронизироваться с Threads, Workers и Stackables.
</p>
<h2>
    Объект Thread
</h2>
<hr />
<p>
    Пользователь может осуществлять потоки, расширяя класс Thread, предоставленный от pthreads. Любые элементы могут быть записаны и считаны в любой ситуации с ссылкой на Thread, любой контекст может также выполнять любые открытые и защищенные методы. Метод run реализации выполняется в отдельном потоке, когда метод start реализации вызывается из контекста (это поток или процесс), что его создал. Только контекст, что создает поток может начать и присоединиться к нему.
</p>
<h2>
    Объект Worker
</h2>
<hr />
<p>
    Worker Thread (рабочий поток) имеет постоянное состояние, и будет доступен с вызовом метода start, пока объект не выходит из области видимости, или явно не выключается. Любой контекст со ссылкой может передать объекты типа Stackable для Worker'а, который будет выполняться с помощью Worker'а в отдельном потоке. Метод run Worker'а выполняется перед любыми объектами в стеке, так что он может инициализировать ресурсы, которые могут понадобиться для Stackables.
</p>
<h2>
    Объект Stackable
</h2>
<hr />
<p>
    Объект Stackable может читать / писать и выполнять Worker Thread (рабочий поток) во время исполнения своего
    метода run, кроме того, любой контекст со ссылкой на Stackable можно читать, писать и выполнять его методы до выполнения и после выполнения.
</p>
<h2>
    Синхронизация
</h2>
<hr />
<p>
    Все объекты, которые pthreads создает, построены в синхронизации в виде ::wait и ::notify. Вызов ::wait на объекте вызовет контекст ждать, а в другом контексте вызовется ::notify (уведомить) на том же объекте. Это позволяет мощно синхронизировать между собой Threaded Objects (потоковые объекты) в PHP.
</p>
<h2>
    Подождите, Threaded Objects (потоковые объекты)?
</h2>
<hr />
<p>
    Stackable, Thread или Worker могут рассматриваться, и должны быть использованы в качестве Threaded StdClass: Thread, Worker и Stackable все ведут себя так же, в любом контексте со ссылкой.
</p>
<p>
    Любые объекты, которые предназначены для использования в многопоточных частях вашего приложения должны
    наследоваться от Stackable, Thread или Worker,
    то есть они должны реализовать run метод, но он может быть никогда не вызван; часто будет так,
    что объекты используются в многопоточной среде, предназначенной для исполнения. Это означает любой контекст (Thread/Worker/Stackable/Process) со ссылкой может читать, писать и выполнять объекты Threaded Object до,
    во время и после выполнения.
</p>
<h2>
    Метод Modifiers
</h2>
<hr />
<p>
    Защищенные методы объектов Threaded Objects защищены с помощью pthreads, так что только один контекст может вызвать этот метод одновременно. Private методы объектов Threaded Objects можно вызвать только изнутри объекта Threaded Object во
    время выполнения.
</p>
<h2>
    Хранение данных
</h2>
<hr />
<p>
    Как правило, любой тип данных, который может быть сериализован может быть использован в качестве объекта Threaded object, он может быть считан и записан в любом контексте со ссылкой на Threaded Object. Не каждый тип данных хранится сериализованно, основные типы хранятся в их истинном виде . Сложные типы, массивы и объекты, которые не являются Threaded хранятся сериализованно; они могут быть прочитаны и записаны в Threaded Object из любого контекста со ссылкой.
</p>
<p>
    За исключением Threaded Objects, любая ссылка используемая для установки объекта Threaded Objects, отделена от ссылки в Threaded Objects; одни и те же данные могут быть считаны непосредственно с Threaded Objects в любой момент в любой ситуации со ссылкой на Threaded Objects.
</p>
<h2>
    Ресурсы
</h2>
<hr />
<p>
    Расширения и функциональность, которые определяют ресурсы в PHP являются совершенно не готовыми к такой среде;
    pthreads предусматривает ресурсы, которые будут общими для контекстов, однако большинство видов ресурсов будут иметь проблемы. Большую часть времени, ресурсы не должны разделяться между контекстами и когда они должны быть основными типами, такие как потоки и сокеты.
</p>
<p>
    Официально ресурсы остаются без поддержки.
</p>
<h2>
    Работа продолжается
</h2>
<hr />
<p>
    pthreads был и есть эксперимент с довольно хорошими результатами. Любое из его ограничений или особенностей может измениться в любой момент; так как это природа экспериментов. Эти ограничения - зачастую навязываются реализациями -
    существуют не зря. Целью pthreads является предоставление полезного решения для многозадачности в PHP на любом уровне, в среде которых pthreads выполняется, некоторые ограничения и лимиты необходимы для того, чтобы обеспечить стабильную среду.
</p>