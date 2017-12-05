SELECT
	[Air_Quality].[data].[RawReading].rawreadingid
	, [Air_Quality].config.[Site].Name			AS samplingpoint
	, [Air_Quality].Config.measure.code			AS pollutantname
	, [Air_Quality].data.RawReading.RawValue	AS rawdatavalue
	, [Air_Quality].data.RawReading.MeasuredAt	AS raw_reading_measurement_time
	, [Air_Quality].config.Unit.Name		AS measurementunit
	, [Air_Quality].config.MeasureType.Name		AS measurementtype

FROM		[Air_Quality].[data].[RawReading]
INNER JOIN	[Air_Quality].config.SiteMeasure	ON	[Air_Quality].data.RawReading.SiteMeasureID 	= [Air_Quality].config.SiteMeasure.SiteMeasureID
							AND	[Air_Quality].data.RawReading.SiteMeasureID	= [Air_Quality].config.SiteMeasure.SiteMeasureID
INNER JOIN	[Air_Quality].config.Site		ON	[Air_Quality].config.SiteMeasure.SiteID		= [Air_Quality].config.Site.SiteID
							AND	[Air_Quality].config.SiteMeasure.SiteID		= [Air_Quality].config.Site.SiteID
INNER JOIN	[Air_Quality].config.Measure		ON	[Air_Quality].config.SiteMeasure.MeasureID	= [Air_Quality].config.Measure.MeasureID
							AND	[Air_Quality].config.SiteMeasure.MeasureID	= [Air_Quality].config.Measure.MeasureID
LEFT OUTER JOIN	[Air_Quality].config.MeasureType 	ON 	[Air_Quality].config.Measure.MeasureTypeID	= [Air_Quality].config.MeasureType.MeasureTypeID
LEFT OUTER JOIN [Air_Quality].config.Unit		ON 	[Air_Quality].config.Measure.UnitID		= [Air_Quality].config.Unit.UnitID

WHERE	[Air_Quality].Config.measure.code = 'O3'
AND 	[Air_Quality].data.RawReading.MeasuredAt  >= :sql_last_value

ORDER BY [Air_Quality].data.RawReading.MeasuredAt
