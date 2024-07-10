<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('dashboard'));
});

// Home > Anggaran Kegiatan
Breadcrumbs::for('kegiatan.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Anggaran Kegiatan', route('kegiatan.index'));
});

// Home > Anggaran Kegiatan > Tambah
Breadcrumbs::for('kegiatan.create', function (BreadcrumbTrail $trail) {
    $trail->parent('kegiatan.index');
    $trail->push('Tambah', route('kegiatan.create'));
});

// Home > Anggaran Kegiatan > Edit
Breadcrumbs::for('kegiatan.edit', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('kegiatan.index');
    $trail->push('Edit', route('kegiatan.edit', $id));
});

// Home > Anggaran Kegiatan > Sub Kegiatan
Breadcrumbs::for('sub_kegiatan.index', function (BreadcrumbTrail $trail, $anggaranKegiatanId) {
    $trail->parent('kegiatan.index');
    $trail->push('Anggaran Sub Kegiatan', route('sub_kegiatan.index', ['anggaran_kegiatan_id' => $anggaranKegiatanId]));
});

// Home > Anggaran Kegiatan > Sub Kegiatan > Tambah
Breadcrumbs::for('sub_kegiatan.create', function (BreadcrumbTrail $trail, $anggaranKegiatanId) {
    $trail->parent('sub_kegiatan.index', $anggaranKegiatanId);
    $trail->push('Tambah', route('sub_kegiatan.create', $anggaranKegiatanId));
});

// Home > Anggaran Kegiatan > Sub Kegiatan > Edit
Breadcrumbs::for('sub_kegiatan.edit', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('sub_kegiatan.index');
    $trail->push('Edit', route('sub_kegiatan.edit', $id));
});

// Home > Anggaran Kegiatan > Sub Kegiatan > Rekening
Breadcrumbs::for('rekening.index', function (BreadcrumbTrail $trail, $anggaranKegiatanId, $anggaranSubKegiatanId) {
    $trail->parent('sub_kegiatan.index', $anggaranKegiatanId, $anggaranSubKegiatanId);
    $trail->push('Anggaran Rekening', route('rekening.index', $anggaranKegiatanId, $anggaranSubKegiatanId));
});

// Home > Anggaran Kegiatan > Sub Kegiatan > Rekening > Tambah
Breadcrumbs::for('rekening.create', function (BreadcrumbTrail $trail, $anggaranKegiatanId, $anggaranSubKegiatanId) {
    $trail->parent('rekening.index', $anggaranKegiatanId, $anggaranSubKegiatanId);
    $trail->push('Tambah', route('rekening.create', $anggaranKegiatanId, $anggaranSubKegiatanId));
});

// Home > Anggaran Kegiatan > Sub Kegiatan > Rekening > Edit
Breadcrumbs::for('rekening.edit', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('rekening.index');
    $trail->push('Edit', route('rekening.edit', $id));
});
