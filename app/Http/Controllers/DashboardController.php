<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function index()
    {
        // Sample data - replace with actual database queries or API calls
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
        // Sample contacts data - replace with actual database queries or API calls
        $contacts = [
            [
                'id' => 1,
                'name' => 'John Doe',
                'mobile' => '+1234567890',
                'group' => 'VIP Customers',
                'tags' => ['Premium', 'Active']
            ],
            [
                'id' => 2,
                'name' => 'Jane Smith',
                'mobile' => '+0987654321',
                'group' => 'Regular Customers',
                'tags' => ['New', 'Interested']
            ],
            [
                'id' => 3,
                'name' => 'Mike Johnson',
                'mobile' => '+1122334455',
                'group' => 'VIP Customers',
                'tags' => ['Premium', 'Loyal']
            ],
            [
                'id' => 4,
                'name' => 'Sarah Wilson',
                'mobile' => '+5566778899',
                'group' => 'Regular Customers',
                'tags' => ['Active']
            ],
            [
                'id' => 5,
                'name' => 'David Brown',
                'mobile' => '+9988776655',
                'group' => 'New Customers',
                'tags' => ['New', 'Potential']
            ],
        ];

        return view('contacts', compact('contacts'));
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
        // Sample tags data - replace with actual database queries or API calls
        $tags = [
            ['id' => 1, 'name' => 'Premium'],
            ['id' => 2, 'name' => 'Active'],
            ['id' => 3, 'name' => 'New'],
            ['id' => 4, 'name' => 'Interested'],
            ['id' => 5, 'name' => 'Loyal'],
            ['id' => 6, 'name' => 'Potential'],
            ['id' => 7, 'name' => 'Inactive'],
            ['id' => 8, 'name' => 'VIP'],
            ['id' => 9, 'name' => 'Business'],
            ['id' => 10, 'name' => 'Retail']
        ];

        return view('tags', compact('tags'));
    }
}