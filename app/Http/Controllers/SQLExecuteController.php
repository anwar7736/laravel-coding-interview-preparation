<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SQLExecuteController extends Controller
{
    public function create()
    {
        return view('sql_execute.create');
    }

public function execute(Request $request)
{
    try {
        $query = $request->input('query');
        $queries = array_filter(array_map('trim', explode(';', $query)));
        $results = [];

        foreach ($queries as $singleQuery) {
            if (empty($singleQuery)) continue;

            $command = strtolower(strtok($singleQuery, ' '));

            switch ($command) {
                case 'select':
                    $data = DB::select($singleQuery);
                    $results[] = [
                        'type' => 'select',
                        'query' => $singleQuery,
                        'success' => true,
                        'message' => 'Select query executed successfully.',
                        'data' => $data,
                    ];
                    break;

                case 'insert':
                case 'update':
                case 'delete':
                    $count = DB::affectingStatement($singleQuery);
                    $results[] = [
                        'type' => $command,
                        'query' => $singleQuery,
                        'success' => true,
                        'message' => ucfirst($command) . ' query executed successfully.',
                        'data' => "Affected rows: " . $count,
                    ];
                    break;

                default:
                    $success = DB::statement($singleQuery);
                    $results[] = [
                        'type' => 'statement',
                        'success' => $success,
                        'message' => $success
                            ? 'Statement executed successfully.'
                            : 'Statement execution failed.',
                        'data' => $singleQuery,
                    ];
                    break;
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'All queries executed successfully.',
            'data' => $results,
        ]);

    } catch (\Throwable $th) {
        return response()->json([
            'success' => false,
            'message' => $th->getMessage() . ' Line: ' . $th->getLine(),
            'data' => $th->getMessage() . ' Line: ' . $th->getLine(),
        ]);
    }
}

}
