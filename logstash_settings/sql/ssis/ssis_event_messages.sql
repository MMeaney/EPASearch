SELECT --TOP 1200
	event_message_id,
	operation_id,
	CONVERT(datetime2,LEFT(message_time, 27)) AS message_time,
	RIGHT(message_time, 6) AS message_time_offset,
	message_type,
	Package_name,
	Subcomponent_name,
	Message_source_name,
	[Message],
	CASE 
		WHEN message_type = -1	THEN 'Unknown'
		WHEN message_type = 120	THEN 'Error'
		WHEN message_type = 110	THEN 'Warning'
		WHEN message_type = 70	THEN 'Information'
		WHEN message_type = 10	THEN 'Pre-validate'
		WHEN message_type = 20	THEN 'Post-validate'
		WHEN message_type = 30	THEN 'Pre-execute'
		WHEN message_type = 40	THEN 'Post-execute'
		WHEN message_type = 60	THEN 'Progress'
		WHEN message_type = 50	THEN 'StatusChange'
		WHEN message_type = 100	THEN 'QueryCancel'
		WHEN message_type = 130	THEN 'TaskFailed'
		WHEN message_type = 90	THEN 'Diagnostic'
		WHEN message_type = 200	THEN 'Custom'
		WHEN message_type = 140	THEN 'DiagnosticEx'
		WHEN message_type = 400	THEN 'NonDiagnostic'
		WHEN message_type = 80	THEN 'VariableValueChanged'
		ELSE 'Unknown' 
	END 
	AS [message_type_text],
	message_source_type,
	CASE 
		WHEN message_source_type = 10 THEN 'Entry APIs, such as T-SQL and CLR Stored procedures'
		WHEN message_source_type = 20 THEN 'External process used to run package (ISServerExec.exe)'
		WHEN message_source_type = 30 THEN 'Package-level objects'
		WHEN message_source_type = 40 THEN 'Control Flow tasks'
		WHEN message_source_type = 50 THEN 'Control Flow containers'
		WHEN message_source_type = 60 THEN 'Data Flow task'
		ELSE 'Unknown' 
	END 
	AS [message_source_type_text]
FROM	[SSISDB].[catalog].[event_messages] 
WHERE	message_type IN (120,130)
AND	 	message_time >= :sql_last_value
ORDER BY	event_message_id DESC

