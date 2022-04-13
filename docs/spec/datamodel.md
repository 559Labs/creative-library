---
layout: page
title: Data Model
---


* TOC
{:toc}

## Content Tables

### mediaitems

| Field Name | Type | Notes |
| -- | -- | -- |
| `id` | unsignedBigInt | Increments; Primary Key |
| `created_at` | timestamp | Default=now() |
| `updated_at` | timestamp | Nullable |

### assets

| Field Name | Type | Notes |
| -- | -- | -- |
| `id` | unsignedBigInt | Increments; Primary Key |
| `created_at` | timestamp | Default=now() |
| `updated_at` | timestamp | Nullable |

### tags

| Field Name | Type | Notes |
| -- | -- | -- |
| `id` | unsignedBigInt | Increments; Primary Key |
| `created_at` | timestamp | Default=now() |
| `updated_at` | timestamp | Nullable |



## Users & Accounts

### users

| Field Name | Type | Notes |
| -- | -- | -- |
| `id` | unsignedBigInt | Increments; Primary Key |
| `created_at` | timestamp | Default=now() |
| `updated_at` | timestamp | Nullable |
| `name` | varchar(255)  | |
| `email` | varchar(255) | Unique |
| `email_verified_at` | timestamp | Nullable |
| `password` | varchar(255) | |
| `remember_token` | varchar(100) | Nullable |

### password_resets

| Field Name | Type | Notes |
| -- | -- | -- |
| `id` | unsignedBigInt | Increments; Primary Key |
| `email` | varchar(255) | Indexed |
| `token` | varchar(255) | |
| `created_at` | timestamp | Default=now() |

### personal_access_tokens

| Field Name | Type | Notes |
| -- | -- | -- |
| `id` | unsignedBigInt | Increments; Primary Key |
| `created_at` | timestamp | Default=now() |
| `updated_at` | timestamp | Nullable |
| `tokenable_type` | varchar(255) | Indexed |
| `tokenable_id` | unsignedBigInt | Indexed |
| `name` | varchar(255) | |
| `token` | varchar(64) | Unique |
| `abilities` | text |
| `last_used_at` | timestamp | Nullable |


## Framework

### failed_jobs

| Field Name | Type | Notes |
| -- | -- | -- |
| `id` | unsignedBigInt | Increments; Primary Key |
| `uuid` | varchar(255) |  Unique |
| `connection` | text |  |
| `queue` | text |  |
| `payload` | longtext |  |
| `exception` | longtext |  |
| `failed_at` | timestamp | Default=now() |

### migrations

| Field Name | Type | Notes |
| -- | -- | -- |
| `id` | unsignedBigInt | Increments; Primary Key |
| `migration` | varchar(255) | |
| `batch` | int | |
