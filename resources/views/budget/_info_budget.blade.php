<div class="card-body p-0">
  <table class="table table-sm">
    <tbody>
      <tr>
        <td>{{ trans('t.user.budget.client') }}: </td>
        <td>
          {{ !empty($budget->client) ? $budget->client->presenter()->getFullName() : 'N/A' }}
        </td>
      </tr>
      <tr>
        <td>{{ trans('t.user.budget.user') }}: </td>
        <td>{{ $budget->user->presenter()->getFullName() }}</td>
      </tr>
      <tr>
        <td>{{ trans('t.user.budget.start_date') }}: </td>
        <td>{{ $budget->getDateIn()->getDate() }} {{ $budget->getDateIn()->getTime() }}</td>
      </tr>
      <tr>
        <td>{{ trans('t.user.budget.finish_date') }}: </td>
        <td>{{ $budget->getDateOut()->getDate() }} {{ $budget->getDateOut()->getTime() }}</td>
      </tr>
      <tr>
        <td>{{ trans('t.user.budget.subtotal') }}: </td>
        <td>$ {{ $budget->getSubtotal() }}</td>
      </tr>
      <tr>
        <td>{{ trans('t.user.order.iva') }}: </td>
        <td>{{ $budget->iva }}%</td>
      </tr>
      <tr>
        <td>{{ trans('t.user.budget.total') }}: </td>
        <td><strong>$ {{ $budget->getTotal() }}</strong></td>
      </tr>
    </tbody>
  </table>
</div>