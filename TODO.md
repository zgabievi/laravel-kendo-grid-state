## KENDO GRID STATE

```json
{
    "filter": {
        "logic": "and",
        "filters": [
            {
                "field": "title",
                "ignoreCase": true,
                "operator": "eq",
                "value": "SOME_VALUE"
            }
        ]
    },
    "group": [
        {
            "aggregates": [
                {
                    "aggregate": "min",
                    "field": "title"
                }
            ],
            "dir": "asc",
            "field": "title"
        }
    ],
    "skip": 5,
    "sort": [
        {
            "dir": "asc",
            "field": "title"
        }
    ],
    "take": 5
}
```

### state

- **filter?**
  - **filters[]**
    - **field?** (string | Function)
    - **ignoreCase?** (boolean)
    - **operator** ("eq", "neq", "isnull", "isnotnull", "lt", "lte", "gt", "gte", "startswith", "endswith", "contains", "doesnotcontain", "isempty", "isnotempty")
    - **value?** (any)
  - **logic** ("or", "and")
- **group?[]**
  - **aggregates?[]**
    - **aggregate** ("count", "sum", "average", "min", "max")
    - **field** (string)
  - **dir?** ("asc", "desc")
  - **field** (string)
- **skip?** (number)
- **sort?**
  - **dir?** ("asc", "desc")
  - **field** (string)
- **take?** (number)
  
#### operators
- "eq" (equal to)
- "neq" (not equal to)
- "isnull" (is equal to null)
- "isnotnull" (is not equal to null)
- "lt" (less than)
- "lte" (less than or equal to)
- "gt" (greater than)
- "gte" (greater than or equal to)

##### The following operators are supported for string fields only:
- "startswith"
- "endswith"
- "contains"
- "doesnotcontain"
- "isempty"
- "isnotempty"

## REAL TODO
- [ ] Case sensitivity in filters
- [ ] Groups
