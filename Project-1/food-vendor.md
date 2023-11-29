# Suppliers Table

| SupplierID | SupplierName | SupplierContact     | SupplierAddress         | SupplierPricing |
| ---------- | ------------ | ------------------- | ----------------------- | --------------- |
| 1          | Freshco      | contact@freshco.com | 123 fresh Rd, Montreal  | $2 per unit     |
| 2          | Foodking     | foodking@co.com     | 789 Ocean Ave, Brossard | $3 per pound    |

# Ingredients Table

| IngredientID | IngredientName | IngredientType | SupplierID |
| ------------ | -------------- | -------------- | ---------- |
| 101          | Chicken Breast | Meat           | 1          |
| 102          | Tomatoes       | Vegetables     | 1          |
| 103          | Fishes         | Seafood        | 2          |

# Dishes Table

| DishID | DishName         | DishPrice | IngredientID |
| ------ | ---------------- | --------- | ------------ |
| 201    | Tandoori Chicken | $10       | 101          |
| 202    | Tomato Soup      | $5        | 102          |
| 203    | Fish & Chips     | $15       | 103          |
