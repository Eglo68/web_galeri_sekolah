<td class="p-3 text-right whitespace-nowrap"><a href="{{ route("admin.$n.edit", $i->id) }}" class="text-navy font-semibold text-sm hover:text-gold">Edit</a>
 <form method="post" action="{{ route("admin.$n.destroy", $i->id) }}" class="inline" onsubmit="return confirm('Hapus data ini?')">@csrf @method('DELETE')<button class="text-red-600 text-sm font-semibold ml-3">Hapus</button></form></td>
