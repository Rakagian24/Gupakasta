<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Dashboard
Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('dashboard'));
});

// Dashboard > Anggaran Kegiatan
Breadcrumbs::for('kegiatan.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Anggaran Kegiatan', route('kegiatan.index'));
});

// Dashboard > Anggaran Kegiatan > Tambah
Breadcrumbs::for('kegiatan.create', function (BreadcrumbTrail $trail) {
    $trail->parent('kegiatan.index');
    $trail->push('Tambah', route('kegiatan.create'));
});

// Dashboard > Anggaran Kegiatan > [Nama Kegiatan] > Edit
Breadcrumbs::for('kegiatan.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('kegiatan.index');
    $trail->push('Edit', route('kegiatan.edit'));
});

// Dashboard > Anggaran Kegiatan > Sub Kegiatan
Breadcrumbs::for('sub_kegiatan.index', function (BreadcrumbTrail $trail) {
    $trail->parent('kegiatan.index');
    $trail->push('Anggaran Sub Kegiatan', route('sub_kegiatan.index'));
});

// Dashboard > Anggaran Kegiatan > Sub Kegiatan > Tambah
Breadcrumbs::for('sub_kegiatan.create', function (BreadcrumbTrail $trail) {
    $trail->parent('sub_kegiatan.index');
    $trail->push('Tambah', route('sub_kegiatan.create'));
});

// Dashboard > Anggaran Kegiatan > Sub Kegiatan > [Nama Sub Kegiatan] > Edit
Breadcrumbs::for('sub_kegiatan.edit', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('sub_kegiatan.index');
    $trail->push('Edit', route('sub_kegiatan.edit', $id));
});

// Dashboard > Anggaran Kegiatan > Sub Kegiatan > Rekening
Breadcrumbs::for('rekening.index', function (BreadcrumbTrail $trail) {
    $trail->parent('sub_kegiatan.index');
    $trail->push('Anggaran Rekening', route('rekening.index'));
});

// Dashboard > Anggaran Kegiatan > Sub Kegiatan > Rekening > Tambah
Breadcrumbs::for('rekening.create', function (BreadcrumbTrail $trail) {
    $trail->parent('rekening.index');
    $trail->push('Tambah', route('rekening.create'));
});

// Dashboard > Anggaran Kegiatan > Sub Kegiatan > Rekening > [Nama Rekening] > Edit
Breadcrumbs::for('rekening.edit', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('rekening.index');
    $trail->push('Edit', route('rekening.edit', $id));
});
