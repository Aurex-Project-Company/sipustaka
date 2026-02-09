<?php
/* Master Data Buku */
$bookPages = [
    'categories',
    'categories-add',
    'categories-edit',
    'books'
];
$isBookActive = in_array($page, $bookPages);

/* Master Data Anggota */
$memberPages = [
    'classrooms',
    'classrooms-add',
    'classrooms-edit',
    'academic-years', 
    'academic-years-add', 
    'academic-years-edit',
    'teachers',
    'teachers-add',
    'teachers-edit',
    'students',
    'students-add',
    'students-edit',
];
$isMemberActive = in_array($page, $memberPages);

function active($pages, $currentPage) {
    if (is_array($pages)) {
        return in_array($currentPage, $pages)
            ? 'bg-slate-700 font-semibold'
            : '';
    }

    return $pages === $currentPage
        ? 'bg-slate-700 font-semibold'
        : '';
}