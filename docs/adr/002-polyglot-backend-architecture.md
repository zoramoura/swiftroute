# ADR 002: Polyglot Backend Architecture (Laravel + Node.js)

## Status
Accepted

## Context
SwiftRoute requires both heavy relational business logic (order lifecycles, state validation, authorization) and high-concurrency real-time capabilities (live GPS tracking broadcasts over persistent WebSocket connections).

## Decision
We split backend responsibilities into two distinct runtimes:
1. `backend-core` (PHP 11 / Laravel): Serves as the primary REST API, handling domain logic, database persistence, and authentication.
2. `backend-realtime` (Node.js / Express + Socket.io): Serves as a dedicated real-time gateway focused on managing persistent I/O-heavy WebSocket connections.

## Consequences
- **Positive:** Optimizes runtime performance per domain concern; Laravel handles structured business rules while Node.js manages thousands of concurrent WebSocket connections efficiently.
- **Negative:** Increases operational complexity by introducing dual-stack maintenance and requiring inter-service messaging.