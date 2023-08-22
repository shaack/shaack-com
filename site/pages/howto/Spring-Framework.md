# Spring Framework

## Controllers

### Optional Path Variables

- From [baeldung.com "Spring Optional Path Variables"](https://www.baeldung.com/spring-optional-path-variables)

```java
@RequestMapping(value = {"/article", "/article/{id}"})
public Article getArticle(@PathVariable Map<String, String> pathVarsMap) {
    String articleId = pathVarsMap.get("id");
    if (articleId != null) {
        Integer articleIdAsInt = Integer.valueOf(articleId);
        //...
    } else {
        //...
    }
}
```

## Pointcut Expressions

### Wildcards

- `*`: Matches any number of characters within a package name, but only matches one package level. |
- `..`: Matches any number of characters within a package name, and matches any number of package levels. |

### Designators

- `execution`: For matching method execution join points, this is the primary pointcut designator you will use when working with Spring AOP.
- `within`: Within certain types.
- `this`: Bean reference is an instance of the given type.
- `target`: Target object is an instance of the given type.
- `args`: Arguments are instances of the given types.
- `@annotation`: Has the given annotation.

### Operators

- `&&`: Logical AND.
- `||`: Logical OR.
- `!`: Logical NOT.

### Examples

- `execution(* com.example.service.*.*(..))`: Matches any method execution in the service package.
- `execution(* com.example.service..*.*(..))`: Matches any method execution in the service package and any sub-package.
- `within(com.example.service.*)`: Matches any join point in the service package.
- `within(com.example.service..*)`: Matches any join point in the service package and any sub-package.
- `this(com.example.service.SomeService)`: Matches any join point where the proxy implements the SomeService interface.
- `target(com.example.service.SomeService)`: Matches any join point where the target object implements the SomeService interface.
- `args(java.io.Serializable)`: Matches any join point where the arguments are Serializable.
- `@annotation(com.example.annotation.SomeAnnotation)`: Matches any join point where the method has the SomeAnnotation annotation.

## See also

- [Spring Framework](https://spring.io/)
- [Spring Framework Reference Documentation](https://docs.spring.io/spring/docs/current/spring-framework-reference/)
- [Spring Framework Reference Documentation - AOP](https://docs.spring.io/spring/docs/current/spring-framework-reference/core.html#aop)