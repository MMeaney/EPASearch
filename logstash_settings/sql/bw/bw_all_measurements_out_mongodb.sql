SELECT DISTINCT
	MON.MonitoringResultId
	, MON.LocationId
	, MON.SampleCode
	, MON.ResultDate
	, MON.EcoliResult
	, MON.EnterococciResult
	, MON.Status
FROM	[BathingWater-STG].[dbo].[MonitoringResult]	MON


WHERE	ResultDate 	<=	GETDATE()
AND		ResultDate 	>= :sql_last_value

ORDER BY Resultdate