# Enums in PHP

Examples of enumeration implementation in PHP.

- [Season](./src/Season.php) - most primitive implementation
- [MicrophoneConnector](./src/MicrophoneConnector.php) - implementation using static methods to create instances
- [Decision](./src/Decision.php) - enumeration as singleton, [Order](./src/Order.php) is serializable entity containing an enumeration
- [Size](./src/Decision.php) - implementation wich use `__callStatic()` for instance creation
- [Color](./src/Color.php) - numeration as singleton wich use `__callStatic()` for instance creation
