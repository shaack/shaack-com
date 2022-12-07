# CakePHP

## Database naming conventions

- Table name: `projects`, `project_statuses`, `customers`, `addresses`
  - If not sure, try `Inflector::pluralize('project_status')`
- Primary key: `id`
- Foreign keys: `customer_id`, `project_status_id`
  - Self reference: `parent_id`
- Display field: Call it `name`, to automatically use it when baking
- Timestamp: The fields `created` and `modified` will be automatically updated

## Steps to add a field manually to a CakePHP model

1. Add the field in the database
2. Add the property to the `Model/Entity` header as `@property`
3. Add the property to the `$_accessible` list
4. Clear the `_cake_model` cache

## Add a record with a field filled in from request parameters

In the Controllers `function add()`

```php
if ($this->request->is('post')) {
    // [...]
} else { // add this
    $entityName->fieldName = $this->request->getQuery("fieldName");
}
```

## Do not redirect to list after saving a form

In the Controllers `function edit($id = null)`

```php
if ($this->request->is(['patch', 'post', 'put'])) {
    $entityName = $this->Entity->patchEntity($entityName, $this->request->getData());
    if ($this->Entity->save($entityName)) {
        $this->Flash->success(__('The entity has been saved.'));
        // return $this->redirect(['action' => 'index']); // remove this
    } else { // add else
        $this->Flash->error(__('The entity could not be saved. Please, try again.'));
    }
}
```