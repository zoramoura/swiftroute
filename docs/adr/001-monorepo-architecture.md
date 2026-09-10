# ADR 001: Adoption of Monorepo Architecture

## Status
Accepted

## Context
SwiftRoute consists of three distinct runtime environments:
- Core API (`backend-core`: PHP 11 / Laravel) for business logic and persistent state.
- Real-time Gateway (`backend-realtime`: Node.js / Express + Socket.io) for high-concurrency WebSocket pushes.
- Web Dashboard (`web-dashboard`: Vue 3 / Vite) for the user interface.

We needed a system structure that streamlines cross-service orchestration, local development, and testing while preventing repository sprawl during early development phases.

## Decision
We adopt a monorepo structure with top-level directories for each domain responsibility (`backend-core`, `backend-realtime`, `web-dashboard`, `docker`) and a single root `docker-compose.yml` for orchestration.

## Consequences
- **Positive:** Single version-controlled repository, frictionless cross-service integration testing, unified issue tracking, and simplified Docker orchestration.
- **Negative:** Requires team discipline to enforce network boundaries so services do not bypass application contracts (e.g., preventing Node.js from accessing Laravel's database directly).