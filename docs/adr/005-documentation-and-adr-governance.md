# ADR 005: Adoption of Architecture Decision Records (ADRs) and Continuous Docs

## Status
Accepted

## Context
Architectural decisions and trade-offs risk being lost over time if they are not stored alongside the application source code or if documentation is treated as an isolated post-project phase.

## Decision
We adopt Documentation as Code (DaC). We store immutable, lightweight Architecture Decision Records in `docs/adr/`, write OpenAPI specifications alongside API development, and maintain deployment scripts in the root directory.

## Consequences
- **Positive:** Ensures long-term maintainability, full architectural traceability across pull requests, and transparent technical governance.
- **Negative:** Requires continuous engineering discipline to update and maintain documentation alongside code changes.