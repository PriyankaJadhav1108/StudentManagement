# What is Unit Testing?

## Definition

Unit testing is a level of software testing where individual units/components of a software are tested. The purpose is to validate that each unit of the software performs as designed.

## Key Characteristics

### 1. **Isolation**
- Tests are run in isolation from other tests
- No dependencies on external systems (database, network, etc.) unless mocked
- Each test sets up its own test data

### 2. **Automation**
- Tests are written in code and executed automatically
- No manual intervention required
- Can be run as part of CI/CD pipelines

### 3. **Repeatability**
- Same test should produce same results every time
- No flaky tests that pass/fail randomly

### 4. **Fast Execution**
- Tests should complete in milliseconds to seconds
- Enables running tests frequently during development

## Types of Unit Tests

### 1. **State-based Testing**
- Tests the state of the system after operations
- Example: Testing if a function returns the correct value

### 2. **Interaction-based Testing**
- Tests how units interact with each other
- Uses mocks and stubs to verify method calls

### 3. **Data-driven Testing**
- Tests with multiple sets of input data
- Uses data providers to supply test data

## Unit Testing vs Other Testing Types

| Aspect | Unit Testing | Integration Testing | System Testing |
|--------|-------------|-------------------|---------------|
| Scope | Individual functions/methods | Multiple components | Entire system |
| Dependencies | Mocked/Stubbed | Real dependencies | Real environment |
| Speed | Fast (ms-seconds) | Medium | Slow |
| Purpose | Verify logic | Verify interactions | Verify end-to-end functionality |

## Best Practices

1. **Test One Thing**: Each test should verify one specific behavior
2. **Descriptive Names**: Use clear, descriptive test method names
3. **Arrange-Act-Assert**: Follow this pattern in each test
4. **Independent Tests**: Tests should not depend on each other
5. **Fast Feedback**: Tests should run quickly for immediate feedback
6. **Maintainable**: Tests should be easy to understand and modify

## Common Testing Patterns

- **Given-When-Then**: Business-readable test structure
- **Builder Pattern**: For complex test data setup
- **Object Mother**: Factory for creating test objects
- **Test Data Builders**: Fluent interfaces for test data creation