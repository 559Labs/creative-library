---
title: Framework Tables
tags: [schema, database]
sidebar: main_sidebar
permalink: /schema-framework.html
toc: true
---

## failed_jobs

| Field Name | Type | Notes |
| -- | -- | -- |
| `id` | unsignedBigInt | Increments; Primary Key |
| `uuid` | varchar(255) |  Unique |
| `connection` | text |  |
| `queue` | text |  |
| `payload` | longtext |  |
| `exception` | longtext |  |
| `failed_at` | timestamp | Default=now() |


## migrations

| Field Name | Type | Notes |
| -- | -- | -- |
| `id` | unsignedBigInt | Increments; Primary Key |
| `migration` | varchar(255) | |
| `batch` | int | |
