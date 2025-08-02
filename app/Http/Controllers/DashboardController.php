<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_messages' => 12345,
            'total_sent' => 8234,
            'total_received' => 4111,
            'total_templates' => 45,
        ];

        $messages = [
            [
                'id' => 1,
                'status' => 'delivered',
                'display_sender' => 'John Doe',
                'timestamp' => '2024-01-15 10:30 AM',
                'sender_receiver' => '+1234567890',
                'message_content' => 'Hello, how can I help you today?',
            ],
            [
                'id' => 2,
                'status' => 'sent',
                'display_sender' => 'Jane Smith',
                'timestamp' => '2024-01-15 09:15 AM',
                'sender_receiver' => '+0987654321',
                'message_content' => 'Thank you for your quick response!',
            ],
            [
                'id' => 3,
                'status' => 'failed',
                'display_sender' => 'Mike Johnson',
                'timestamp' => '2024-01-15 08:45 AM',
                'sender_receiver' => '+1122334455',
                'message_content' => 'Can you please send me the details?',
            ],
        ];

        return view('dashboard', compact('stats', 'messages'));
    }

    public function contacts()
    {
        try {
            $response = Http::withToken(session('tickzap_token'))
                ->get('https://api.tickzap.com/api/contacts');

            if ($response->successful()) {
                $contacts = $response->json('data', []);
                return view('contacts', compact('contacts'));
            } else {
                return view('contacts', ['contacts' => [], 'error' => 'Failed to fetch contacts']);
            }
        } catch (\Exception $e) {
            return view('contacts', ['contacts' => [], 'error' => 'Error connecting to API']);
        }
    }

    public function storeContact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|max:20',
            'group_id' => 'required|integer',
            'tags' => 'sometimes|array',
            'tags.*' => 'integer'
        ]);

        try {
            $response = Http::withToken(session('tickzap_token'))
                ->post('https://api.tickzap.com/api/contacts', [
                    'name' => $request->name,
                    'mobile' => $request->mobile,
                    'group_id' => $request->group_id,
                    'tags' => $request->tags ?? []
                ]);

            if ($response->successful()) {
                return response()->json($response->json(), 201);
            } else {
                return response()->json(['error' => 'Failed to create contact', 'details' => $response->json()], $response->status());
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error connecting to API', 'details' => $e->getMessage()], 500);
        }
    }

    public function updateContact(Request $request, $id)
    {
        $request->validate([
            'name' => 'sometimes|string|max:255',
            'mobile' => 'sometimes|string|max:20',
            'group_id' => 'sometimes|integer',
            'tags' => 'sometimes|array',
            'tags.*' => 'integer'
        ]);

        try {
            $data = array_filter([
                'name' => $request->name,
                'mobile' => $request->mobile,
                'group_id' => $request->group_id,
                'tags' => $request->tags
            ], fn($value) => !is_null($value));

            $response = Http::withToken(session('tickzap_token'))
                ->post("https://api.tickzap.com/api/contacts-update/{$id}", $data);

            if ($response->successful()) {
                return response()->json($response->json());
            } else {
                return response()->json(['error' => 'Failed to update contact', 'details' => $response->json()], $response->status());
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error connecting to API', 'details' => $e->getMessage()], 500);
        }
    }

    public function deleteContact($id)
    {
        try {
            $response = Http::withToken(session('tickzap_token'))
                ->post("https://api.tickzap.com/api/contacts-delete/{$id}");

            if ($response->successful()) {
                return response()->json(['message' => 'Contact deleted successfully']);
            } else {
                return response()->json(['error' => 'Failed to delete contact', 'details' => $response->json()], $response->status());
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error connecting to API', 'details' => $e->getMessage()], 500);
        }
    }

    public function groups()
    {
        try {
            $response = Http::withToken(session('tickzap_token'))
                ->get('https://api.tickzap.com/api/groups');

            if ($response->successful()) {
                $groups = $response->json('data', []);
                return view('groups', compact('groups'));
            } else {
                return view('groups', ['groups' => [], 'error' => 'Failed to fetch groups']);
            }
        } catch (\Exception $e) {
            return view('groups', ['groups' => [], 'error' => 'Error connecting to API']);
        }
    }

    public function storeGroup(Request $request)
    {
        $request->validate([
            'group_name' => 'required|string|max:255',
            'whatsapp_business_account_id' => 'sometimes|string'
        ]);

        try {
            $response = Http::withToken(session('tickzap_token'))
                ->post('https://api.tickzap.com/api/groups', [
                    'group_name' => $request->group_name,
                    'whatsapp_business_account_id' => $request->whatsapp_business_account_id ?? '378243102032704'
                ]);

            if ($response->successful()) {
                return response()->json($response->json(), 201);
            } else {
                return response()->json(['error' => 'Failed to create group', 'details' => $response->json()], $response->status());
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error connecting to API', 'details' => $e->getMessage()], 500);
        }
    }

    public function updateGroup(Request $request, $id)
    {
        $request->validate([
            'group_name' => 'required|string|max:255'
        ]);

        try {
            $response = Http::withToken(session('tickzap_token'))
                ->post("https://api.tickzap.com/api/groups-update/{$id}", [
                    'group_name' => $request->group_name
                ]);

            if ($response->successful()) {
                return response()->json($response->json());
            } else {
                return response()->json(['error' => 'Failed to update group', 'details' => $response->json()], $response->status());
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error connecting to API', 'details' => $e->getMessage()], 500);
        }
    }

    public function deleteGroup($id)
    {
        try {
            $response = Http::withToken(session('tickzap_token'))
                ->post("https://api.tickzap.com/api/groups-delete/{$id}");

            if ($response->successful()) {
                return response()->json(['message' => 'Group deleted successfully']);
            } else {
                return response()->json(['error' => 'Failed to delete group', 'details' => $response->json()], $response->status());
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error connecting to API', 'details' => $e->getMessage()], 500);
        }
    }

    public function tags()
    {
        try {
            $waba_id = session('waba_id', '378243102032704');
            $response = Http::withToken(session('tickzap_token'))
                ->get("https://api.tickzap.com/api/tags/{$waba_id}");

            if ($response->successful()) {
                $tags = $response->json('data', []);
                return view('tags', compact('tags'));
            } else {
                return view('tags', ['tags' => [], 'error' => 'Failed to fetch tags']);
            }
        } catch (\Exception $e) {
            return view('tags', ['tags' => [], 'error' => 'Error connecting to API']);
        }
    }

    public function storeTag(Request $request)
    {
        $request->validate([
            'tag_name' => 'required|string|max:255',
            'whatsapp_business_account_id' => 'sometimes|string'
        ]);

        try {
            $response = Http::withToken(session('tickzap_token'))
                ->post('https://api.tickzap.com/api/tags', [
                    'tag_name' => $request->tag_name,
                    'whatsapp_business_account_id' => $request->whatsapp_business_account_id ?? '378243102032704'
                ]);

            if ($response->successful()) {
                return response()->json($response->json(), 201);
            } else {
                return response()->json(['error' => 'Failed to create tag', 'details' => $response->json()], $response->status());
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error connecting to API', 'details' => $e->getMessage()], 500);
        }
    }

    public function updateTag(Request $request, $id)
    {
        $request->validate([
            'tag_name' => 'required|string|max:255'
        ]);

        try {
            $response = Http::withToken(session('tickzap_token'))
                ->post("https://api.tickzap.com/api/tags-update/{$id}", [
                    'tag_name' => $request->tag_name
                ]);

            if ($response->successful()) {
                return response()->json($response->json());
            } else {
                return response()->json(['error' => 'Failed to update tag', 'details' => $response->json()], $response->status());
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error connecting to API', 'details' => $e->getMessage()], 500);
        }
    }

    public function deleteTag($id)
    {
        try {
            $response = Http::withToken(session('tickzap_token'))
                ->post("https://api.tickzap.com/api/tags-delete/{$id}");

            if ($response->successful()) {
                return response()->json(['message' => 'Tag deleted successfully']);
            } else {
                return response()->json(['error' => 'Failed to delete tag', 'details' => $response->json()], $response->status());
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error connecting to API', 'details' => $e->getMessage()], 500);
        }
    }
}
