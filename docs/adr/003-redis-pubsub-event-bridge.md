# ADR 003: Inter-Service Event Communication via Redis Pub/Sub

## Status
Accepted

## Context
`backend-realtime` needs to broadcast state updates (triggered inside `backend-core`) to connected clients via WebSockets, without forcing `backend-core` to track client socket states or make blocking HTTP calls to the Node.js service.

## Decision
We adopt Redis Pub/Sub as an asynchronous message broker between services. `backend-core` publishes domain events to Redis channels, which `backend-realtime` consumes and forwards to connected WebSocket clients.

## Consequences
- **Positive:** Fully decouples `backend-core` from `backend-realtime`, offers high message throughput, and prevents blocking execution threads during state broadcasts.
- **Negative:** Basic Redis Pub/Sub operates on at-most-once delivery without built-in message replay, requiring careful event design for critical state recovery.