
                        @if(!$user_info_data->isEmpty())
                            @foreach($user_info_data as $user_info)
                                <tr>
                                    <td>{{ ucwords($user_info->name) }}</td>
                                    <td>{{ $user_info->email }}</td>
                                    <td>{{ $user_info->city }}</td>
                                    <td>{{ $user_info->date_of_birth }}</td>
                                    <td>{{ $user_info->status }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr><td class="alert alert-danger text-center" colspan="5"><strong>No Records Found</strong></td></tr>
                        @endif

                        <tr>
                            <td colspan="5" text-align="center">
                            {{ $user_info_data->links() }}
                            </td>
                        </tr>