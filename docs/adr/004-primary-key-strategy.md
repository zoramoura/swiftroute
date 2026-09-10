# ADR 004: Internal Auto-Increment IDs with Public UUIDs

## Status
Accepted

## Context
Exposing auto-incrementing integer IDs (`/deliveries/1`) in public APIs leaks business volume metrics to external observers and tightly couples distributed client resource creation to internal database sequence generators.

## Decision
We use standard auto-incrementing big integers (`id`) for internal primary keys and database joins, paired with indexed UUIDs (`uuid`) for all public routing and API payload resolution.

## Consequences
- **Positive:** High B-Tree indexing performance for internal relational joins, zero leakage of operational metrics, and decoupled public resource routing.
- **Negative:** Introduces minor storage overhead for indexed UUID columns and requires UUID lookup resolution (`findByUuid`) in Laravel application logic.