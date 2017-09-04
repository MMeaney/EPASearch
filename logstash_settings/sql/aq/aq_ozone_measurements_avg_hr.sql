SELECT 
	hourlyavgcals.DatesForCalculationOfCONC60 
	, hourlyavgcals.SamplingPoint 
	, hourlyavgcals.PollutantName 
	, AVG(hourlyavgcals.RawDataValue) AS hourlyavgconcs 

FROM 
(
	SELECT 
		[Air_Quality].data.RawReading.MeasuredAt	AS Raw_Reading_Measurement_Time
		, [Air_Quality].config.[Site].Name			AS SamplingPoint 
		, [Air_Quality].Config.measure.code			AS PollutantName
		, [Air_Quality].data.RawReading.RawValue	AS RawDataValue
		, CASE DATEPART(MINUTE,[Air_Quality].data.RawReading.MeasuredAt)                 
			WHEN 15 THEN DATEADD(minute,+45,[Air_Quality].data.RawReading.MeasuredAt)                 
			WHEN 30 THEN DATEADD(minute,+30,[Air_Quality].data.RawReading.MeasuredAt)                 
			WHEN 45 THEN DATEADD(minute,+15,[Air_Quality].data.RawReading.MeasuredAt)  
			WHEN 0 THEN [Air_Quality].data.RawReading.MeasuredAt             
			END 
		AS DatesForCalculationOfCONC60 
	FROM		[Air_Quality].[data].[RawReading] 
	INNER JOIN	[Air_Quality].config.SiteMeasure	ON	[Air_Quality].data.RawReading.SiteMeasureID = [Air_Quality].config.SiteMeasure.SiteMeasureID 
													AND	[Air_Quality].data.RawReading.SiteMeasureID = [Air_Quality].config.SiteMeasure.SiteMeasureID 
	INNER JOIN	[Air_Quality].config.Site			ON	[Air_Quality].config.SiteMeasure.SiteID		= [Air_Quality].config.Site.SiteID 
													AND	[Air_Quality].config.SiteMeasure.SiteID		= [Air_Quality].config.Site.SiteID 
	INNER JOIN	[Air_Quality].config.Measure		ON	[Air_Quality].config.SiteMeasure.MeasureID	= [Air_Quality].config.Measure.MeasureID 
													AND	[Air_Quality].config.SiteMeasure.MeasureID	= [Air_Quality].config.Measure.MeasureID 
	LEFT OUTER JOIN	[Air_Quality].config.MeasureType ON [Air_Quality].config.Measure.MeasureTypeID	= [Air_Quality].config.MeasureType.MeasureTypeID 
	LEFT OUTER JOIN [Air_Quality].config.Unit		 ON [Air_Quality].config.Measure.UnitID			= [Air_Quality].config.Unit.UnitID 
	
	WHERE	[Air_Quality].Config.measure.code = 'O3'
	--AND		[Air_Quality].data.RawReading.MeasuredAt >= :sql_last_value
) 
AS hourlyavgcals   

--WHERE 		hourlyavgcals.DatesForCalculationOfCONC60  >= :sql_last_value

GROUP BY	hourlyavgcals.DatesForCalculationOfCONC60
			, hourlyavgcals.PollutantName
			, hourlyavgcals.SamplingPoint  

ORDER BY	hourlyavgcals.SamplingPoint  
			, hourlyavgcals.DatesForCalculationOfCONC60
			, hourlyavgcals.PollutantName
